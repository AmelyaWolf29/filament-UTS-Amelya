<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Schemas\Schema as FilamentSchema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(FilamentSchema $schema): FilamentSchema // ✅ signature pakai alias
    {
        return $schema->components([
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

            TextInput::make('excerpt')
                ->label('Ringkasan')
                ->maxLength(255),

            FileUpload::make('featured_image')
                ->label('Gambar Utama')
                ->image()
                ->directory('articles')
                ->visibility('public'),

            RichEditor::make('content')
                ->label('Konten')
                ->columnSpanFull(),

            Select::make('status')
                ->options(['draft' => 'Draft', 'published' => 'Published'])
                ->default('draft'),
            
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

            DateTimePicker::make('published_at')
                ->label('Tanggal Terbit')
                ->native(false)
                ->seconds(false),
        ]);
    }
}
