<?php

namespace App\Filament\Admin\Resources\SeoSettingResource\Pages;

use App\Filament\Admin\Resources\SeoSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeoSettings extends ListRecords
{
    protected static string $resource = SeoSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
