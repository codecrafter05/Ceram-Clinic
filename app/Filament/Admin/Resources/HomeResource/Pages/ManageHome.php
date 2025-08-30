<?php

namespace App\Filament\Admin\Resources\HomeResource\Pages;

use App\Filament\Admin\Resources\HomeResource;
use Filament\Resources\Pages\Page;
use App\Models\Home;

class ManageHome extends Page
{
    protected static string $resource = HomeResource::class;

    public function mount(): void
    {
        $first = Home::firstOrCreate([]);

        $this->redirect(
            route('filament.admin.resources.homes.edit', ['record' => $first->id])
        );
    }

    public function getView(): string
    {
        return 'filament::pages.empty';
    }
}
