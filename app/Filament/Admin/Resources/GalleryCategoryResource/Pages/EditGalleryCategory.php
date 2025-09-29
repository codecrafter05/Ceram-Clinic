<?php

namespace App\Filament\Admin\Resources\GalleryCategoryResource\Pages;

use App\Filament\Admin\Resources\GalleryCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGalleryCategory extends EditRecord
{
    protected static string $resource = GalleryCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
