<?php

namespace App\Filament\Resources\UsuariResource\Pages;

use App\Filament\Resources\UsuariResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUsuari extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = UsuariResource::class;
}
