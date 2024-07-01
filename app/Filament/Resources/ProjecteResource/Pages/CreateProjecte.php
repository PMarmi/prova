<?php

namespace App\Filament\Resources\ProjecteResource\Pages;

use App\Filament\Resources\ProjecteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjecte extends CreateRecord
{
    protected static string $resource = ProjecteResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
