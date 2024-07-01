<?php

namespace App\Filament\Resources\ComentariResource\Pages;

use App\Filament\Resources\ComentariResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComentari extends EditRecord
{
    protected static string $resource = ComentariResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
