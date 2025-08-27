<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CustomPageResource\Pages;
use App\Filament\Admin\Resources\CustomPageResource\RelationManagers;
use App\Models\CustomPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str; 

class CustomPageResource extends Resource
{
    protected static ?string $model = CustomPage::class;
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $navigationGroup = 'Site Content';
    protected static ?string $navigationLabel = 'Custom page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('page_name_en')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str($state)->slug())),
            Forms\Components\TextInput::make('page_name_ar')
                ->label('اسم الصفحة (AR)')
                ->required(),

            Forms\Components\TextInput::make('title_en')
                ->label('Title (EN)')
                ->required(),
            Forms\Components\TextInput::make('title_ar')
                ->label('العنوان (AR)')
                ->required(),

            Forms\Components\TextInput::make('slug')
                ->hidden()
                ->readOnly()
                ->dehydrated()              // يرسل القيمة لو موجودة (مثلاً عند التعديل)
                ->unique(ignoreRecord: true),

            Forms\Components\RichEditor::make('description_en')
                ->label('Description (EN)')
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('description_ar')
                ->label('الوصف (AR)')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_name_en')->label('Page (EN)'),
                Tables\Columns\TextColumn::make('page_name_ar')->label('Page (AR)'),
                Tables\Columns\TextColumn::make('slug')->label('Slug'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCustomPages::route('/'),
            'create' => Pages\CreateCustomPage::route('/create'),
            'edit' => Pages\EditCustomPage::route('/{record}/edit'),
        ];
    }
}
