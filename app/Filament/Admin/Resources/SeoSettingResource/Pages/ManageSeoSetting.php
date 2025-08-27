<?php

namespace App\Filament\Admin\Resources\SeoSettingResource\Pages;

use App\Filament\Admin\Resources\SeoSettingResource;
use Filament\Resources\Pages\Page;
use App\Models\SeoSetting;

class ManageSeoSetting extends Page
{
    protected static string $resource = SeoSettingResource::class;

    public function mount(): void
    {
        $first = SeoSetting::firstOrCreate([]);

        $this->redirect(
            route('filament.admin.resources.seo-settings.edit', ['record' => $first->id])
        );
    }

    public function getView(): string
    {
        return 'filament::pages.empty';
    }
}
