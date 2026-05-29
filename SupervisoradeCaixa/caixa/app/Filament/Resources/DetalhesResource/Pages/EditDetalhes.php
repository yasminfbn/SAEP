<?php

namespace App\Filament\Resources\DetalhesResource\Pages;

use App\Filament\Resources\DetalhesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetalhes extends EditRecord
{
    protected static string $resource = DetalhesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
