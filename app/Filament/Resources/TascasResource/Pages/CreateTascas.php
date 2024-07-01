<?php

namespace App\Filament\Resources\TascasResource\Pages;

use App\Filament\Resources\TascasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTascas extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = TascasResource::class;
}
