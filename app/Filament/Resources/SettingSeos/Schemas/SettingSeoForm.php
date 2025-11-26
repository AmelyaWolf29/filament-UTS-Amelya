<?php

namespace App\Filament\Resources\SettingSeos\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class SettingSeoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('meta_title')
                    ->label('Judul SEO')
                    ->required()
                    ->maxLength(150),
                
                TextInput::make('meta_description')
                    ->label('Deskripsi SEO')
                    ->required()
                    ->maxLength(255),

                TextInput::make('meta_keywords')
                    ->label('Kata Kunci SEO')
                    ->required()
                    ->maxLength(255),

                TextInput::make('robots')
                    ->label('Meta Robots SEO')
                    ->required()
                    ->placeholder('index, follow')
                    ->helperText('Masukkan meta robots, misal: index, follow atau noindex, nofollow'),
            ]);
    }
}
