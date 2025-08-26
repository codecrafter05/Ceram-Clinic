<?php

namespace App\Filament\Admin\Resources\FAQCategoryResource\Pages;

use App\Filament\Admin\Resources\FAQCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFAQCategories extends ListRecords
{
    protected static string $resource = FAQCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
