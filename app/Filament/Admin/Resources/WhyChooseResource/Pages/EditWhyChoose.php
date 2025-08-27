<?php

namespace App\Filament\Admin\Resources\WhyChooseResource\Pages;

use App\Filament\Admin\Resources\WhyChooseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWhyChoose extends EditRecord
{
    protected static string $resource = WhyChooseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
