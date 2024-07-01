<?php

namespace App\Filament\Resources\ComentariResource\Pages;

use App\Filament\Resources\ComentariResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComentari extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = ComentariResource::class;
}
