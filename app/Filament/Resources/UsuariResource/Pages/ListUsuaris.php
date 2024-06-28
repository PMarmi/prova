<?php

namespace App\Filament\Resources\UsuariResource\Pages;

use App\Filament\Resources\UsuariResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsuaris extends ListRecords
{
    protected static string $resource = UsuariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
