<?php

namespace App\Filament\Admin\Resources\CustomPageResource\Pages;

use App\Filament\Admin\Resources\CustomPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomPage extends CreateRecord
{
    protected static string $resource = CustomPageResource::class;
}
