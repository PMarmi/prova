<?php

namespace App\Filament\Resources\UsuariResource\Pages;

use App\Filament\Resources\UsuariResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUsuari extends ViewRecord
{
    protected static string $resource = UsuariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
