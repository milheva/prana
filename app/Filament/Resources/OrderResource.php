<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Pesanan';

    protected static ?string $modelLabel = 'Pesanan';

    protected static ?string $pluralModelLabel = 'Pesanan';

    protected static ?string $navigationGroup = 'Penjualan';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pesanan')
                    ->schema([
                        Forms\Components\TextInput::make('order_number')
                            ->label('Nomor Pesanan')
                            ->disabled()
                            ->dehydrated(false),

                        Forms\Components\Select::make('user_id')
                            ->label('Pelanggan')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->disabled(fn(string $operation) => $operation === 'edit'),

                        Forms\Components\Select::make('status')
                            ->label('Status Pesanan')
                            ->options([
                                'pending' => 'Menunggu',
                                'processing' => 'Diproses',
                                'shipped' => 'Dikirim',
                                'delivered' => 'Diterima',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->required()
                            ->default('pending'),

                        Forms\Components\Select::make('payment_status')
                            ->label('Status Pembayaran')
                            ->options([
                                'pending' => 'Menunggu',
                                'paid' => 'Dibayar',
                                'failed' => 'Gagal',
                            ])
                            ->required()
                            ->default('pending'),

                        Forms\Components\Select::make('payment_method')
                            ->label('Metode Pembayaran')
                            ->options([
                                'cod' => 'Cash on Delivery',
                                'bank_transfer' => 'Transfer Bank',
                                'ewallet' => 'E-Wallet',
                            ])
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Informasi Pengiriman')
                    ->schema([
                        Forms\Components\TextInput::make('shipping_name')
                            ->label('Nama Penerima')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('shipping_phone')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->required()
                            ->maxLength(20),

                        Forms\Components\Textarea::make('shipping_address')
                            ->label('Alamat Lengkap')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('shipping_city')
                            ->label('Kota')
                            ->required()
                            ->maxLength(100),

                        Forms\Components\TextInput::make('shipping_province')
                            ->label('Provinsi')
                            ->required()
                            ->maxLength(100),

                        Forms\Components\TextInput::make('shipping_postal_code')
                            ->label('Kode Pos')
                            ->required()
                            ->maxLength(10),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Rincian Harga')
                    ->schema([
                        Forms\Components\TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->numeric()
                            ->prefix('Rp')
                            ->disabled()
                            ->dehydrated(false),

                        Forms\Components\TextInput::make('shipping_cost')
                            ->label('Ongkos Kirim')
                            ->numeric()
                            ->prefix('Rp')
                            ->required()
                            ->default(15000),

                        Forms\Components\TextInput::make('total')
                            ->label('Total')
                            ->numeric()
                            ->prefix('Rp')
                            ->disabled()
                            ->dehydrated(false),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Catatan')
                    ->schema([
                        Forms\Components\Textarea::make('notes')
                            ->label('Catatan Pesanan')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('No. Pesanan')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Nomor pesanan disalin!')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('items_count')
                    ->label('Jumlah Item')
                    ->counts('items')
                    ->alignCenter()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable()
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

                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Metode')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'cod' => 'COD',
                        'bank_transfer' => 'Transfer',
                        'ewallet' => 'E-Wallet',
                        default => $state,
                    })
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status Pesanan')
                    ->options([
                        'pending' => 'Menunggu',
                        'processing' => 'Diproses',
                        'shipped' => 'Dikirim',
                        'delivered' => 'Diterima',
                        'cancelled' => 'Dibatalkan',
                    ])
                    ->multiple(),

                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('Status Pembayaran')
                    ->options([
                        'pending' => 'Menunggu',
                        'paid' => 'Dibayar',
                        'failed' => 'Gagal',
                    ])
                    ->multiple(),

                Tables\Filters\SelectFilter::make('payment_method')
                    ->label('Metode Pembayaran')
                    ->options([
                        'cod' => 'COD',
                        'bank_transfer' => 'Transfer Bank',
                        'ewallet' => 'E-Wallet',
                    ]),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Sampai Tanggal'),
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
                Tables\Actions\Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->color('gray')
                    ->url(fn(Order $record): string => route('orders.show', $record))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('mark_processing')
                        ->label('Tandai Diproses')
                        ->icon('heroicon-o-clock')
                        ->color('info')
                        ->requiresConfirmation()
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'processing'])),
                    Tables\Actions\BulkAction::make('mark_shipped')
                        ->label('Tandai Dikirim')
                        ->icon('heroicon-o-truck')
                        ->color('primary')
                        ->requiresConfirmation()
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'shipped'])),
                    Tables\Actions\BulkAction::make('mark_delivered')
                        ->label('Tandai Diterima')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'delivered'])),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['user', 'items']);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}
