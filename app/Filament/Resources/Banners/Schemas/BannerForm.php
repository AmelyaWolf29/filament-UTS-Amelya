<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required(),
                TextInput::make('subtitle')
                    ->label('Subjudul')
                    ->required(),
                FileUpload::make('image_url')
                    ->label('URL Gambar')
                    ->image()
                    ->required(),
                TextInput::make('link_url')
                    ->label('Link URL')
                    ->url()
                    ->required(),
                TextInput::make('position')
                    ->label('Lokasi Penempatan')
                    ->required()
                    ->default('top'),
                TextInput::make('order_index')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->required(),
                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->formatStateUsing(fn ($state) => $state ? 'Aktif' : 'Nonaktif')
                    ->required(),
                DateTimePicker::make('start_date')
                    ->label('Jadwal mulai tampil'),
                DateTimePicker::make('end_date')
                    ->label('Jadwal berakhir'),
            ]);
    }
}
