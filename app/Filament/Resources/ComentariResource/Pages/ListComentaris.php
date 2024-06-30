<?php

namespace App\Filament\Resources\ComentariResource\Pages;

use App\Filament\Resources\ComentariResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComentaris extends ListRecords
{
    protected static string $resource = ComentariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
