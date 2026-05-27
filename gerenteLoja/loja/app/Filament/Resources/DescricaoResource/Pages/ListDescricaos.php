<?php

namespace App\Filament\Resources\DescricaoResource\Pages;

use App\Filament\Resources\DescricaoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDescricaos extends ListRecords
{
    protected static string $resource = DescricaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
