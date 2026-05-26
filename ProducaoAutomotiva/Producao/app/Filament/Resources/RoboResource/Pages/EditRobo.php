<?php

namespace App\Filament\Resources\RoboResource\Pages;

use App\Filament\Resources\RoboResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRobo extends EditRecord
{
    protected static string $resource = RoboResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
