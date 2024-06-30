<?php

namespace App\Filament\Resources\TascasResource\Pages;

use App\Filament\Resources\TascasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTascas extends ListRecords
{
    protected static string $resource = TascasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
