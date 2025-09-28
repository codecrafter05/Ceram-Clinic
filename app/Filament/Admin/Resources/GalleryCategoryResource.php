<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GalleryCategoryResource\Pages;
use App\Filament\Admin\Resources\GalleryCategoryResource\RelationManagers;
use App\Models\GalleryCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryCategoryResource extends Resource
{
    protected static ?string $model = GalleryCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Gallery Categories';
    protected static ?string $navigationGroup = 'Gallery';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Titles')
                ->schema([
                    Forms\Components\TextInput::make('name_ar')
                        ->label('الاسم (AR)')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('name_en')
                        ->label('Name (EN)')
                        ->maxLength(255)
                        ->required(),
                ])->columns(2),

            Forms\Components\Section::make('Display')
                ->schema([
                    Forms\Components\TextInput::make('sort_order')
                        ->label('Order')
                        ->numeric()
                        ->default(0),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->label('Name')
                    ->getStateUsing(fn ($record) => $record->getText('name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListGalleryCategories::route('/'),
            'create' => Pages\CreateGalleryCategory::route('/create'),
            'edit' => Pages\EditGalleryCategory::route('/{record}/edit'),
        ];
    }
}
