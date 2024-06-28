<?php

namespace App\Filament\Resources\ProjecteResource\Pages;

use App\Filament\Resources\ProjecteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectes extends ListRecords
{
    protected static string $resource = ProjecteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
