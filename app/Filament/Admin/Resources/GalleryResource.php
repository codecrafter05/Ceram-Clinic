<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GalleryResource\Pages;
use App\Filament\Admin\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Gallery';
    protected static ?string $navigationLabel = 'Gallery Items';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('gallery_category_id')
                    ->label('Category')
                    ->relationship('category', 'name_en')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Section::make('Media')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gallery Image/Video')
                            ->directory('ceram/gallery')
                            ->imageEditor()
                            ->helperText('Upload a gallery image or video')
                            ->required(),

                        Forms\Components\Select::make('type')
                            ->label('Media Type')
                            ->options([
                                'image' => 'Image',
                                'video' => 'Video',
                            ])
                            ->default('image')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Titles')
                    ->schema([
                        Forms\Components\TextInput::make('title_ar')
                            ->label('العنوان (AR)')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('title_en')
                            ->label('Title (EN)')
                            ->maxLength(255),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Media')
                    ->circular(),

                Tables\Columns\TextColumn::make('category.name_en')
                    ->label('Category')
                    ->getStateUsing(fn ($record) => $record->category ? $record->category->getText('name') : '-')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('title_en')
                    ->label('Title')
                    ->getStateUsing(fn ($record) => $record->getText('title'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'image' => 'success',
                        'video' => 'warning',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
