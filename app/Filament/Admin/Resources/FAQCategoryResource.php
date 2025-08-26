<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FAQCategoryResource\Pages;
use App\Models\FAQCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FAQCategoryResource extends Resource
{
    protected static ?string $model = FAQCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'FAQ Categories';
    protected static ?string $navigationGroup = 'FAQ';

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
            // (اختياري) ترتيب افتراضي حسب sort_order ثم id
            ->defaultSort('sort_order')
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->label('Name')
                    // نعرض حسب اللغة الحالية عبر الموديل
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

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListFAQCategories::route('/'),
            'create' => Pages\CreateFAQCategory::route('/create'),
            'edit'   => Pages\EditFAQCategory::route('/{record}/edit'),
        ];
    }
}
