<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\WhyChooseResource\Pages;
use App\Filament\Admin\Resources\WhyChooseResource\RelationManagers;
use App\Models\WhyChoose;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WhyChooseResource extends Resource
{
    protected static ?string $model = WhyChoose::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';
    protected static ?string $navigationLabel = 'Why Choose Us';
    protected static ?string $navigationGroup = 'Site Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Titles')
                ->schema([
                    Forms\Components\TextInput::make('title_ar')->label('العنوان (AR)')->required()->maxLength(255),
                    Forms\Components\TextInput::make('title_en')->label('Title (EN)')->required()->maxLength(255),
                ])->columns(2),

            Forms\Components\Section::make('Descriptions')
                ->schema([
                    Forms\Components\Textarea::make('description_ar')->label('الوصف (AR)')->rows(4),
                    Forms\Components\Textarea::make('description_en')->label('Description (EN)')->rows(4),
                ])->columns(2),

            Forms\Components\Section::make('Icon & Layout')
                ->schema([
                    Forms\Components\FileUpload::make('icon')
                        ->label('Icon')
                        ->directory('why-choose/icons')
                        ->image()
                        ->imageEditor()
                        ->maxSize(2048)
                        ->helperText('ارفع أيقونة (PNG/SVG/JPG) 2MB'),

                    Forms\Components\Select::make('position')
                        ->label('Position')
                        ->options(['left' => 'Left Column', 'right' => 'Right Column'])
                        ->required()
                        ->default('left'),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Sort Order')
                        ->numeric()
                        ->default(0)
                        ->helperText('ترتيب العرض داخل نفس العمود'),
                ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                Tables\Columns\ImageColumn::make('icon')->label('Icon')->height(32)->width(32),
                Tables\Columns\TextColumn::make('title_ar')->label('العنوان (AR)')->searchable(),
                Tables\Columns\TextColumn::make('title_en')->label('Title (EN)')->searchable(),
                Tables\Columns\BadgeColumn::make('position')->colors([
                    'success' => 'left',
                    'info'    => 'right',
                ])->label('Position'),
                Tables\Columns\TextColumn::make('sort_order')->label('Order')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListWhyChooses::route('/'),
            'create' => Pages\CreateWhyChoose::route('/create'),
            'edit'   => Pages\EditWhyChoose::route('/{record}/edit'),
        ];
    }
}
