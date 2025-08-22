<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SettingResource\Pages;
use App\Filament\Admin\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $pluralModelLabel = 'Settings';
    protected static ?string $modelLabel = 'Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Branding
                Section::make('Branding')->schema([
                    FileUpload::make('site_logo')
                        ->label('Site Logo')
                        ->image()
                        ->directory('settings')
                        ->disk('public')
                        ->maxSize(2048),

                    FileUpload::make('site_icon')
                        ->label('Site Icon')
                        ->image()
                        ->directory('settings')
                        ->disk('public')
                        ->maxSize(1024),
                ])->columns(2),

                // Contact
                Section::make('Contact')->schema([
                    TextInput::make('contact_number')
                        ->label('Contact Number'),
                    TextInput::make('contact_email')
                        ->label('Contact Email')
                        ->email(),
                ])->columns(2),

                // Location
                Section::make('Location')->schema([
                    TextInput::make('location_text_en')
                        ->label('Location Text (EN)'),
                    TextInput::make('location_text_ar')
                        ->label('Location Text (AR)'),
                    TextInput::make('location_url')
                        ->label('Location URL')
                        ->placeholder('https://www.google.com/maps/embed?pb=...')
                         ->helperText('place the long map url https://www.google.com/maps/embed?pb=...')
                        ->url(),
                ])->columns(3),

                // Social Media
                Section::make('Social Media')->schema([
                    Repeater::make('social_media')
                        ->label('Social Media (JSON)')
                        ->schema([
                            TextInput::make('text_en')->label('Text (EN)')->required(),
                            TextInput::make('text_ar')->label('Text (AR)')->required(),
                            TextInput::make('link')->label('Link')->url()->required(),
                        ])
                        ->columns(3)
                        ->collapsible()
                        ->reorderable()
                        ->defaultItems(0),
                ]),

                // Footer
                Section::make('Footer')->schema([
                    TextInput::make('copyright')
                        ->label('Copyright')
                        ->placeholder('© ' . date('Y') . ' Ceram Clinic. All rights reserved'),
                ]),
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
            'index' => Pages\ManageSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
