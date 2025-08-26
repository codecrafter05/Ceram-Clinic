<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AboutResource\Pages;
use App\Filament\Admin\Resources\AboutResource\RelationManagers;
use App\Models\About;
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
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Site Content';
    protected static ?string $navigationLabel = 'About';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero About')
                    ->description('Main About section (images, titles, subtitles, and goals).')
                    ->schema([
                        FileUpload::make('about_img1')
                            ->label('About Image 1')
                            ->image()
                            ->directory('ceram/about')
                            ->imageEditor()
                            ->helperText('Recommended size: 408x390 px')
                            ->nullable(),

                        FileUpload::make('about_img2')
                            ->label('About Image 2')
                            ->image()
                            ->directory('ceram/about')
                            ->imageEditor()
                            ->helperText('Recommended size: 384x270 px')
                            ->nullable(),

                        TextInput::make('title_en')
                            ->label('Title (EN)')
                            ->maxLength(255),
                        TextInput::make('title_ar')
                            ->label('العنوان (AR)')
                            ->maxLength(255),

                        TextInput::make('subTitle_en')
                            ->label('Sub Title (EN)')
                            ->maxLength(255),
                        TextInput::make('subTitle_ar')
                            ->label('العنوان الفرعي (AR)')
                            ->maxLength(255),

                        Repeater::make('goals')
                            ->label('Goals (EN/AR)')
                            ->schema([
                                Textarea::make('text_en')
                                    ->label('Text (EN)')
                                    ->rows(2),
                                Textarea::make('text_ar')
                                    ->label('النص (AR)')
                                    ->rows(2),
                            ])
                            ->collapsed()
                            ->reorderable(true)
                            ->addActionLabel('Add Goal')
                            ->grid(2)
                            ->nullable(),
                    ])
                    ->columns(2),

                Section::make('FAQ Section')
                    ->description('FAQ image, titles, and list of Q&A in EN/AR.')
                    ->schema([
                        FileUpload::make('faq_img')
                            ->label('FAQ Image')
                            ->image()
                            ->directory('ceram/about')
                            ->imageEditor()
                            ->helperText('Recommended size: 612x652 px')
                            ->nullable(),

                        TextInput::make('faq_title_en')
                            ->label('FAQ Title (EN)')
                            ->maxLength(255),
                        TextInput::make('faq_title_ar')
                            ->label('عنوان الأسئلة الشائعة (AR)')
                            ->maxLength(255),

                        TextInput::make('faq_subTitle_en')
                            ->label('FAQ Sub Title (EN)')
                            ->maxLength(255),
                        TextInput::make('faq_subTitle_ar')
                            ->label('العنوان الفرعي (AR)')
                            ->maxLength(255),

                        Repeater::make('faq')
                            ->label('FAQs')
                            ->schema([
                                TextInput::make('question_en')
                                    ->label('Question (EN)')
                                    ->maxLength(255),
                                TextInput::make('question_ar')
                                    ->label('السؤال (AR)')
                                    ->maxLength(255),

                                Textarea::make('answer_en')
                                    ->label('Answer (EN)')
                                    ->rows(3),
                                Textarea::make('answer_ar')
                                    ->label('الإجابة (AR)')
                                    ->rows(3),
                            ])
                            ->collapsed()
                            ->reorderable(true)
                            ->addActionLabel('Add FAQ')
                            ->grid(2)
                            ->nullable(),
                    ])
                    ->columns(2),
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
            'index' => Pages\ManageAbout::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
