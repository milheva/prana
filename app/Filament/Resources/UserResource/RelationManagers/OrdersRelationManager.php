<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class OrdersRelationManager extends RelationManager
{
  protected static string $relationship = 'orders';

  protected static ?string $title = 'Riwayat Pesanan';

  protected static ?string $recordTitleAttribute = 'order_number';

  public function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('order_number')
          ->label('No. Pesanan')
          ->searchable()
          ->copyable()
          ->weight('bold'),

        Tables\Columns\TextColumn::make('items_count')
          ->label('Items')
          ->counts('items')
          ->alignCenter()
          ->badge()
          ->color('info'),

        Tables\Columns\TextColumn::make('total')
          ->label('Total')
          ->money('IDR')
          ->weight('bold'),

        Tables\Columns\TextColumn::make('status')
          ->label('Status')
          ->badge()
          ->color(fn(string $state): string => match ($state) {
            'pending' => 'warning',
            'processing' => 'info',
            'shipped' => 'primary',
            'delivered' => 'success',
            'cancelled' => 'danger',
            default => 'gray',
          })
          ->formatStateUsing(fn(string $state): string => match ($state) {
            'pending' => 'Menunggu',
            'processing' => 'Diproses',
            'shipped' => 'Dikirim',
            'delivered' => 'Diterima',
            'cancelled' => 'Dibatalkan',
            default => $state,
          }),

        Tables\Columns\TextColumn::make('payment_status')
          ->label('Pembayaran')
          ->badge()
          ->color(fn(string $state): string => match ($state) {
            'pending' => 'warning',
            'paid' => 'success',
            'failed' => 'danger',
            default => 'gray',
          })
          ->formatStateUsing(fn(string $state): string => match ($state) {
            'pending' => 'Menunggu',
            'paid' => 'Dibayar',
            'failed' => 'Gagal',
            default => $state,
          }),

        Tables\Columns\TextColumn::make('created_at')
          ->label('Tanggal')
          ->dateTime('d M Y, H:i')
          ->sortable(),
      ])
      ->filters([
        //
      ])
      ->headerActions([
        // Tidak perlu create karena order dibuat dari frontend
      ])
      ->actions([
        Tables\Actions\ViewAction::make()
          ->url(fn($record): string => route('filament.admin.resources.orders.view', ['record' => $record])),
      ])
      ->bulkActions([
        // Tidak ada bulk action
      ])
      ->defaultSort('created_at', 'desc');
  }
}
