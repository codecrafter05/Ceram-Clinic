<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SeoSettingResource\Pages;
use App\Filament\Admin\Resources\SeoSettingResource\RelationManagers;
use App\Models\SeoSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class SeoSettingResource extends Resource
{
    protected static ?string $model = SeoSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';
    protected static ?string $navigationGroup = 'Site Content';
    protected static ?string $navigationLabel = 'SEO Settings';
    protected static ?string $modelLabel = 'SEO Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            Section::make('Home Page')
                ->schema([
                    TextInput::make('title_home')->label('Title'),
                    FileUpload::make('image_home')->label('Image')->image()->directory('ceram/seo')->imageEditor(),
                    Textarea::make('key_home')->label('Keywords')->rows(2)
                        ->helperText('Comma separated keywords'),
                    Textarea::make('description_home')->label('Description')->rows(3),
                ])->collapsible()->columns(2),

            Section::make('About Page')
                ->schema([
                    TextInput::make('title_about')->label('Title'),
                    FileUpload::make('image_about')->label('Image')->image()->directory('ceram/seo')->imageEditor(),
                    Textarea::make('key_about')->label('Keywords')->rows(2),
                    Textarea::make('description_about')->label('Description')->rows(3),
                ])->collapsible()->columns(2),

            Section::make('Contact Page')
                ->schema([
                    TextInput::make('title_contact')->label('Title'),
                    FileUpload::make('image_contact')->label('Image')->image()->directory('ceram/seo')->imageEditor(),
                    Textarea::make('key_contact')->label('Keywords')->rows(2),
                    Textarea::make('description_contact')->label('Description')->rows(3),
                ])->collapsible()->columns(2),

            Section::make('Team Page')
                ->schema([
                    TextInput::make('title_team')->label('Title'),
                    FileUpload::make('image_team')->label('Image')->image()->directory('ceram/seo')->imageEditor(),
                    Textarea::make('key_team')->label('Keywords')->rows(2),
                    Textarea::make('description_team')->label('Description')->rows(3),
                ])->collapsible()->columns(2),

            Section::make('Service Page')
                ->schema([
                    TextInput::make('title_service')->label('Title'),
                    FileUpload::make('image_service')->label('Image')->image()->directory('ceram/seo')->imageEditor(),
                    Textarea::make('key_service')->label('Keywords')->rows(2),
                    Textarea::make('description_service')->label('Description')->rows(3),
                ])->collapsible()->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ManageSeoSetting::route('/'),
            'create' => Pages\CreateSeoSetting::route('/create'),
            'edit' => Pages\EditSeoSetting::route('/{record}/edit'),
        ];
    }
}
