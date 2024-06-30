<?php

namespace App\Filament\Resources\TascasResource\Pages;

use App\Filament\Resources\TascasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTascas extends EditRecord
{
    protected static string $resource = TascasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
