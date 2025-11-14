<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
  protected static string $relationship = 'items';

  protected static ?string $title = 'Item Pesanan';

  protected static ?string $recordTitleAttribute = 'product_name';

  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('product_name')
          ->label('Nama Produk')
          ->disabled(),

        Forms\Components\TextInput::make('product_sku')
          ->label('SKU')
          ->disabled(),

        Forms\Components\TextInput::make('price')
          ->label('Harga')
          ->numeric()
          ->prefix('Rp')
          ->disabled(),

        Forms\Components\TextInput::make('quantity')
          ->label('Jumlah')
          ->numeric()
          ->disabled(),

        Forms\Components\TextInput::make('subtotal')
          ->label('Subtotal')
          ->numeric()
          ->prefix('Rp')
          ->disabled(),
      ]);
  }

  public function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('product.image')
          ->label('Gambar')
          ->square()
          ->defaultImageUrl(url('/images/placeholder.png')),

        Tables\Columns\TextColumn::make('product_name')
          ->label('Produk')
          ->weight('bold')
          ->limit(30),

        Tables\Columns\TextColumn::make('product_sku')
          ->label('SKU')
          ->badge()
          ->color('gray'),

        Tables\Columns\TextColumn::make('price')
          ->label('Harga')
          ->money('IDR'),

        Tables\Columns\TextColumn::make('quantity')
          ->label('Qty')
          ->alignCenter()
          ->badge()
          ->color('info'),

        Tables\Columns\TextColumn::make('subtotal')
          ->label('Subtotal')
          ->money('IDR')
          ->weight('bold'),
      ])
      ->filters([
        //
      ])
      ->headerActions([
        // Tidak perlu create karena items dibuat otomatis saat checkout
      ])
      ->actions([
        Tables\Actions\ViewAction::make(),
      ])
      ->bulkActions([
        // Tidak perlu bulk delete
      ])
      ->paginated(false);
  }
}
