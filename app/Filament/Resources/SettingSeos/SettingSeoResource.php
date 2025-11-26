<?php

namespace App\Filament\Resources\SettingSeos;

use App\Filament\Resources\SettingSeos\Pages\CreateSettingSeo;
use App\Filament\Resources\SettingSeos\Pages\EditSettingSeo;
use App\Filament\Resources\SettingSeos\Pages\ListSettingSeos;
use App\Filament\Resources\SettingSeos\Pages\ViewSettingSeo;
use App\Filament\Resources\SettingSeos\Schemas\SettingSeoForm;
use App\Filament\Resources\SettingSeos\Schemas\SettingSeoInfolist;
use App\Filament\Resources\SettingSeos\Tables\SettingSeosTable;
use App\Models\SettingSeo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingSeoResource extends Resource
{
    protected static ?string $model = SettingSeo::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    //protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $recordTitleAttribute = 'meta_title';

    public static function form(Schema $schema): Schema
    {
        return SettingSeoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SettingSeoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SettingSeosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSettingSeos::route('/'),
            'create' => CreateSettingSeo::route('/create'),
            'view' => ViewSettingSeo::route('/{record}'),
            'edit' => EditSettingSeo::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
        ->withTrashed();
    }
}
