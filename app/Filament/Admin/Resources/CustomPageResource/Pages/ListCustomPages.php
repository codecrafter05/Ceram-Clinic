<?php

namespace App\Filament\Admin\Resources\CustomPageResource\Pages;

use App\Filament\Admin\Resources\CustomPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomPages extends ListRecords
{
    protected static string $resource = CustomPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
