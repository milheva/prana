<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
  protected static ?string $model = User::class;

  protected static ?string $navigationIcon = 'heroicon-o-users';

  protected static ?string $navigationLabel = 'Pelanggan';

  protected static ?string $modelLabel = 'Pelanggan';

  protected static ?string $pluralModelLabel = 'Pelanggan';

  protected static ?string $navigationGroup = 'Pengguna';

  protected static ?int $navigationSort = 1;

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Informasi Pengguna')
          ->schema([
            Forms\Components\TextInput::make('name')
              ->label('Nama Lengkap')
              ->required()
              ->maxLength(255),

            Forms\Components\TextInput::make('email')
              ->label('Email')
              ->email()
              ->required()
              ->unique(ignoreRecord: true)
              ->maxLength(255),

            Forms\Components\TextInput::make('password')
              ->label('Password')
              ->password()
              ->dehydrateStateUsing(fn($state) => Hash::make($state))
              ->dehydrated(fn($state) => filled($state))
              ->required(fn(string $operation): bool => $operation === 'create')
              ->helperText('Kosongkan jika tidak ingin mengubah password'),

            Forms\Components\DateTimePicker::make('email_verified_at')
              ->label('Email Terverifikasi')
              ->helperText('Kosongkan jika belum terverifikasi'),
          ])
          ->columns(2),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('name')
          ->label('Nama')
          ->searchable()
          ->sortable()
          ->weight('bold'),

        Tables\Columns\TextColumn::make('email')
          ->label('Email')
          ->searchable()
          ->sortable()
          ->copyable()
          ->copyMessage('Email disalin!'),

        Tables\Columns\IconColumn::make('email_verified_at')
          ->label('Terverifikasi')
          ->boolean()
          ->trueIcon('heroicon-o-check-circle')
          ->falseIcon('heroicon-o-x-circle')
          ->trueColor('success')
          ->falseColor('danger')
          ->alignCenter()
          ->sortable(),

        Tables\Columns\TextColumn::make('orders_count')
          ->label('Total Pesanan')
          ->counts('orders')
          ->alignCenter()
          ->badge()
          ->color('info')
          ->sortable(),

        Tables\Columns\TextColumn::make('orders_sum_total')
          ->label('Total Belanja')
          ->sum('orders', 'total')
          ->money('IDR')
          ->sortable(),

        Tables\Columns\TextColumn::make('created_at')
          ->label('Terdaftar')
          ->dateTime('d M Y')
          ->sortable()
          ->toggleable(),

        Tables\Columns\TextColumn::make('updated_at')
          ->label('Diperbarui')
          ->dateTime('d M Y, H:i')
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->filters([
        Tables\Filters\TernaryFilter::make('email_verified_at')
          ->label('Email Terverifikasi')
          ->placeholder('Semua')
          ->trueLabel('Terverifikasi')
          ->falseLabel('Belum Terverifikasi')
          ->queries(
            true: fn(Builder $query) => $query->whereNotNull('email_verified_at'),
            false: fn(Builder $query) => $query->whereNull('email_verified_at'),
          ),

        Tables\Filters\Filter::make('created_at')
          ->form([
            Forms\Components\DatePicker::make('created_from')
              ->label('Terdaftar Dari'),
            Forms\Components\DatePicker::make('created_until')
              ->label('Terdaftar Sampai'),
          ])
          ->query(function (Builder $query, array $data): Builder {
            return $query
              ->when(
                $data['created_from'],
                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
              )
              ->when(
                $data['created_until'],
                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
              );
          }),
      ])
      ->actions([
        Tables\Actions\ViewAction::make(),
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
          Tables\Actions\BulkAction::make('verify')
            ->label('Verifikasi Email')
            ->icon('heroicon-o-check-badge')
            ->color('success')
            ->requiresConfirmation()
            ->action(fn(Collection $records) => $records->each->update(['email_verified_at' => now()])),
        ]),
      ])
      ->defaultSort('created_at', 'desc');
  }

  public static function getRelations(): array
  {
    return [
      RelationManagers\OrdersRelationManager::class,
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      'view' => Pages\ViewUser::route('/{record}'),
      'edit' => Pages\EditUser::route('/{record}/edit'),
    ];
  }

  public static function getEloquentQuery(): Builder
  {
    return parent::getEloquentQuery()
      ->withCount(['orders'])
      ->withSum('orders', 'total');
  }

  public static function getNavigationBadge(): ?string
  {
    return static::getModel()::count();
  }
}
