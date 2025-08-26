<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TeamResource\Pages;
use App\Filament\Admin\Resources\TeamResource\RelationManagers;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Basic Info')
                ->schema([
                    Forms\Components\TextInput::make('name_ar')->label('الاسم (AR)')->maxLength(255),
                    Forms\Components\TextInput::make('name_en')->label('Name (EN)')->maxLength(255)->required(),
    
                    Forms\Components\TextInput::make('position_ar')->label('المنصب (AR)')->maxLength(255),
                    Forms\Components\TextInput::make('position_en')->label('Position (EN)')->maxLength(255),
    
                    Forms\Components\FileUpload::make('photo')
                        ->label('Photo')
                        ->directory('team/photos')
                        ->image()
                        ->imageEditor()
                        ->maxSize(4096),
                ])->columns(2),
    
            Forms\Components\Section::make('Social Links')
                ->schema([
                    Forms\Components\Repeater::make('social_links')
                        ->label('Links')
                        ->schema([
                            Forms\Components\Select::make('platform')
                                ->label('Platform')
                                ->options([
                                    'facebook'  => 'Facebook',
                                    'instagram' => 'Instagram',
                                    'x'         => 'X (Twitter)',
                                    'youtube'   => 'YouTube',
                                    'linkedin'  => 'LinkedIn',
                                    'tiktok'    => 'TikTok',
                                    'snapchat'  => 'Snapchat',
                                    'whatsapp'  => 'WhatsApp',
                                    'website'   => 'Website',
                                    'email'     => 'Email',
                                    'phone'     => 'Phone',
                                ])
                                ->searchable()
                                ->required(),
                            Forms\Components\TextInput::make('url')
                                ->label('URL / Handle')
                                ->required()
                                ->maxLength(500),
                        ])
                        ->collapsed()
                        ->cloneable()
                        ->reorderable()
                        ->addActionLabel('Add Link'),
                ]),
    
            Forms\Components\Section::make('Display')
                ->schema([
                    Forms\Components\TextInput::make('sort_order')
                        ->numeric()
                        ->default(0),
                ]),
        ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table->columns([
                Tables\Columns\ImageColumn::make('photo')->label('Photo')->height(48)->width(48),
    
                Tables\Columns\TextColumn::make('name_en')
                    ->label('Name')
                    ->formatStateUsing(fn ($state, $record) => $record->getText('name'))
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('position_en')
                    ->label('Position')
                    ->formatStateUsing(fn ($state, $record) => $record->getText('position'))
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('sort_order')->label('Order')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
