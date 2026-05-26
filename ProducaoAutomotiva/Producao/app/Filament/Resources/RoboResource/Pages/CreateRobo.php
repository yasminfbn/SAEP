<?php

namespace App\Filament\Resources\RoboResource\Pages;

use App\Filament\Resources\RoboResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateRobo extends CreateRecord
{
    protected static string $resource = RoboResource::class;

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Registrado!')
            ->success()
            ->send();
    }
}