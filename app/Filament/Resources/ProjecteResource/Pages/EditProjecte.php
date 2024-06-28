<?php

namespace App\Filament\Resources\ProjecteResource\Pages;

use App\Filament\Resources\ProjecteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjecte extends EditRecord
{
    protected static string $resource = ProjecteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
