<?php

namespace App\Filament\Admin\Resources\AboutResource\Pages;

use App\Filament\Admin\Resources\AboutResource;
use Filament\Resources\Pages\Page;
use App\Models\About;

class ManageAbout extends Page
{
    protected static string $resource = AboutResource::class;

    public function mount(): void
    {
        $first = About::firstOrCreate([]);

        $this->redirect(
            route('filament.admin.resources.abouts.edit', ['record' => $first->id])
        );
    }

    public function getView(): string
    {
        return 'filament::pages.empty';
    }
}
