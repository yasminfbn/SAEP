<?php

namespace App\Filament\Resources\ProducoesResource\Pages;

use App\Filament\Resources\ProducoesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducoes extends ListRecords
{
    protected static string $resource = ProducoesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
