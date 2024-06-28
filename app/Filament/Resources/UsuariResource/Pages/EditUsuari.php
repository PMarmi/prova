<?php

namespace App\Filament\Resources\UsuariResource\Pages;

use App\Filament\Resources\UsuariResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUsuari extends EditRecord
{
    protected static string $resource = UsuariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
