<?php

namespace App\Filament\Resources\DetalhesResource\Pages;

use App\Filament\Resources\DetalhesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetalhes extends ListRecords
{
    protected static string $resource = DetalhesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
