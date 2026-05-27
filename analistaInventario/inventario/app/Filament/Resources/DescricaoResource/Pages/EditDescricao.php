<?php

namespace App\Filament\Resources\DescricaoResource\Pages;

use App\Filament\Resources\DescricaoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDescricao extends EditRecord
{
    protected static string $resource = DescricaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
