<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HomeResource\Pages;
use App\Filament\Admin\Resources\HomeResource\RelationManagers;
use App\Models\Home;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeResource extends Resource
{
    protected static ?string $model = Home::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = 'Home Page';
    
    protected static ?string $modelLabel = 'Home Page';
    
    protected static ?string $pluralModelLabel = 'Home Page';

    protected static ?string $navigationGroup = 'Site Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Home Content')
                    ->tabs([
                        // Hero Section Tab
                        Forms\Components\Tabs\Tab::make('Hero Section')
                            ->schema([
                                Forms\Components\Section::make('Hero Title')
                                    ->schema([
                                        Forms\Components\TextInput::make('hero_title_en')
                                            ->label('Hero Title (English)')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('hero_title_ar')
                                            ->label('Hero Title (Arabic)')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),
                                
                                Forms\Components\Section::make('Hero Description')
                                    ->schema([
                                        Forms\Components\Textarea::make('hero_description_en')
                                            ->label('Hero Description (English)')
                                            ->required()
                                            ->rows(3),
                                        Forms\Components\Textarea::make('hero_description_ar')
                                            ->label('Hero Description (Arabic)')
                                            ->required()
                                            ->rows(3),
                                    ])
                                    ->columns(2),
                                
                                Forms\Components\Section::make('Hero Image')
                                    ->schema([
                                        Forms\Components\FileUpload::make('hero_image')
                                            ->label('Hero Image')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('home/hero')
                                            ->visibility('public'),
                                    ]),
                            ]),
                        
                        // Video Section Tab
                        Forms\Components\Tabs\Tab::make('Video Section')
                            ->schema([
                                Forms\Components\Section::make('Video Title')
                                    ->schema([
                                        Forms\Components\TextInput::make('video_title_en')
                                            ->label('Video Title (English)')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('video_title_ar')
                                            ->label('Video Title (Arabic)')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),
                                
                                Forms\Components\Section::make('Video Subtitle')
                                    ->schema([
                                        Forms\Components\TextInput::make('video_subtitle_en')
                                            ->label('Video Subtitle (English)')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('video_subtitle_ar')
                                            ->label('Video Subtitle (Arabic)')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),
                                
                                Forms\Components\Section::make('Video Settings')
                                    ->schema([
                                        Forms\Components\TextInput::make('video_url')
                                            ->label('Video URL (YouTube)')
                                            ->required()
                                            ->url()
                                            ->placeholder('https://www.youtube.com/watch?v=...'),
                                        
                                        Forms\Components\FileUpload::make('video_background_image')
                                            ->label('Video Background Image')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('home/video')
                                            ->visibility('public'),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_title_en')
                    ->label('Hero Title (EN)')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('hero_title_ar')
                    ->label('Hero Title (AR)')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\ImageColumn::make('hero_image')
                    ->label('Hero Image')
                    ->circular(),
                Tables\Columns\TextColumn::make('video_title_en')
                    ->label('Video Title (EN)')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('video_url')
                    ->label('Video URL')
                    ->limit(30),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ManageHome::route('/'),
            'create' => Pages\CreateHome::route('/create'),
            'edit' => Pages\EditHome::route('/{record}/edit'),
        ];
    }
}
