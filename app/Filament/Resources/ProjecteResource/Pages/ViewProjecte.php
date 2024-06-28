<?php

namespace App\Filament\Resources\ProjecteResource\Pages;

use App\Filament\Resources\ProjecteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProjecte extends ViewRecord
{
    protected static string $resource = ProjecteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
