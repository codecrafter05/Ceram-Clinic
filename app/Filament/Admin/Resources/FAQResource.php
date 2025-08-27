<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FAQResource\Pages;
use App\Models\FAQ;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FAQResource extends Resource
{
    protected static ?string $model = FAQ::class;
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationLabel = 'FAQs';
    protected static ?string $navigationGroup = 'FAQ';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('faq_category_id')
                ->label('Category')
                ->relationship('category', 'name_en')
                ->searchable()
                ->preload()
                ->required(),

            Forms\Components\Section::make('Question')
                ->schema([
                    Forms\Components\TextInput::make('question_ar')
                        ->label('السؤال (AR)')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('question_en')
                        ->label('Question (EN)')
                        ->maxLength(255)
                        ->required(),
                ])->columns(2),

            Forms\Components\Section::make('Answer')
                ->schema([
                    Forms\Components\RichEditor::make('answer_ar')
                        ->label('الجواب (AR)')
                        ->toolbarButtons(['bold','italic','underline','strike','link','orderedList','bulletList'])
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('answer_en')
                        ->label('Answer (EN)')
                        ->toolbarButtons(['bold','italic','underline','strike','link','orderedList','bulletList'])
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Display')
                ->schema([
                    Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
                    Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                // ✅ اعرض اسم الكاتيجري حسب اللغة الحالية
                Tables\Columns\TextColumn::make('category.name_en')
                    ->label('Category')
                    ->getStateUsing(fn ($record) => $record->category ? $record->category->getText('name') : '-')
                    ->sortable()
                    ->searchable(),

                // ✅ اعرض السؤال حسب اللغة الحالية
                Tables\Columns\TextColumn::make('question_en')
                    ->label('Question')
                    ->getStateUsing(fn ($record) => $record->getText('question'))
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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
            'index'  => Pages\ListFAQs::route('/'),
            'create' => Pages\CreateFAQ::route('/create'),
            'edit'   => Pages\EditFAQ::route('/{record}/edit'),
        ];
    }
}
