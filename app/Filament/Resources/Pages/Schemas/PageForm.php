<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, ?string $state): void {
                        $set('slug', Str::slug((string) $state));
                    }),
                
                TextInput::make('slug')
                    ->required()
                    ->rules(['alpha_dash'])
                    ->unique(ignoreRecord: true),
                
                RichEditor::make('content')
                    ->label('Konten')
                    ->columnSpanFull(),
                
                FileUpload::make('featured_image')
                    ->label('Gambar Utama')
                    ->image(),

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
                
                Toggle::make('is_published')
                    ->label('Status publikasi')
                    ->formatStateUsing(fn ($state) => $state ? 'true' : 'false')
                    ->required(),
                
                DateTimePicker::make('published_at')
                    ->label('Tanggal Terbit')
                    ->native(false)
                    ->seconds(false),
            ]);
    }
}
