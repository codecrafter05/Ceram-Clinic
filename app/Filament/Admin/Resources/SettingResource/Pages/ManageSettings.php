<?php

namespace App\Filament\Admin\Resources\SettingResource\Pages;

use App\Filament\Admin\Resources\SettingResource;
use Filament\Resources\Pages\Page;
use App\Models\Setting;

class ManageSettings extends Page
{
    protected static string $resource = SettingResource::class;

    public function mount(): void
    {
        $first = Setting::firstOrCreate([]);

        $this->redirect(
            route('filament.admin.resources.settings.edit', ['record' => $first->id])
        );
    }

    public function getView(): string
    {
        return 'filament::pages.empty';
    }
}
