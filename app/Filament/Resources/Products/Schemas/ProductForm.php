<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_barang')
                    ->label('Kode Barang')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(255),

                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->required()
                    ->default(0),

                Select::make('kategori_id')
                    ->label('Kategori')
                    ->relationship('category', 'nama_kategori')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
