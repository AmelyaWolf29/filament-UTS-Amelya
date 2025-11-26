<?php

namespace App\Filament\Resources\Articles\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;

class ArticlesTable
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
                    ->label('Slug')
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('featured_image')
                    ->label('Gambar Utama')                    
                    ->square()
                    ->size(60),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state) => $state === 'published' ? 'success' : 'warning'),
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
                TextColumn::make('published_at')
                    ->label('Terbit')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->since(), // "x minutes ago"
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published']),
                TrashedFilter::make(),
            ])
            ->headerActions([ CreateAction::make() ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ]);
    }
}
