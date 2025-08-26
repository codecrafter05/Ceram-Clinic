<?php

namespace App\Filament\Admin\Resources\CustomPageResource\Pages;

use App\Filament\Admin\Resources\CustomPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomPage extends EditRecord
{
    protected static string $resource = CustomPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
