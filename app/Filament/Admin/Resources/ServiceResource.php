<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ServiceResource\Pages;
use App\Filament\Admin\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Services';
    protected static ?string $pluralModelLabel = 'Services';
    protected static ?string $modelLabel = 'Service';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Basic Info')
                ->schema([
                    Forms\Components\TextInput::make('title_ar')
                        ->label('العنوان (AR)')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('title_en')
                        ->label('Title (EN)')
                        ->required()
                        ->maxLength(255),
                ])->columns(2),

            Forms\Components\Section::make('Descriptions')
                ->schema([
                    Forms\Components\Textarea::make('description_ar')
                        ->label('الوصف (AR)')
                        ->rows(5),

                    Forms\Components\Textarea::make('description_en')
                        ->label('Description (EN)')
                        ->rows(5),
                ])->columns(2),

            Forms\Components\Section::make('Icon')
                ->schema([
                    Forms\Components\FileUpload::make('icon')
                        ->label('Icon')
                        ->directory('services/icons')
                        ->image()
                        ->imageEditor() // اختياري
                        ->maxSize(2048) // بالـ KB (2MB)
                        ->helperText('ارفع صورة للأيقونة (PNG/SVG/JPG)، حجم أقصى 2MB'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon')
                    ->label('Icon')
                    ->disk('public') // يعتمد على disk الافتراضي لـ FileUpload (public)
                    ->height(40)
                    ->width(40),

                Tables\Columns\TextColumn::make('title_ar')
                    ->label('العنوان (AR)')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title_en')
                    ->label('Title (EN)')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit'   => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
