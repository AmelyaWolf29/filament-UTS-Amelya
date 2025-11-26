<?php

namespace App\Filament\Resources\Pages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class PagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('content')
                    ->label('Konten')
                    ->limit(50) // memotong isi konten
                    ->toggleable(),
                ImageColumn::make('featured_image')
                    ->label('Gambar Utama')                    
                    ->square()
                    ->size(60),
                TextColumn::make('meta_title')
                    ->label('Judul halaman SEO')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('meta_description')
                    ->label('Deskripsi SEO')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('meta_keywords')
                    ->label('Kata Kunci SEO')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_published')
                    ->label('Status publikasi')
                    ->boolean(),
                TextColumn::make('published_at')
                    ->label('Terbit')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('createdBy.name')
                    ->label('Created By')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('updatedBy.name')
                    ->label('Updated By')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->since(), // "x minutes ago"
                TextColumn::make('updated_at')
                    ->since(), // "x minutes ago"
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
