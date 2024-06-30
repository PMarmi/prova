<?php

namespace App\Filament\Resources\ComentariResource\Pages;

use App\Filament\Resources\ComentariResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewComentari extends ViewRecord
{
    protected static string $resource = ComentariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
