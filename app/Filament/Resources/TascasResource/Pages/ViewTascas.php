<?php

namespace App\Filament\Resources\TascasResource\Pages;

use App\Filament\Resources\TascasResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTascas extends ViewRecord
{
    protected static string $resource = TascasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
