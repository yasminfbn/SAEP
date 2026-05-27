<?php

namespace App\Filament\Resources\DestinoResource\Pages;

use App\Filament\Resources\DestinoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateDestino extends CreateRecord
{
    protected static string $resource = DestinoResource::class;
    protected function afterCreate(): void
    {
        Notification::make()
        ->title('Deu tudo certo!')
        ->body('Destino Registrado.')
        ->success()
        ->send();

        $this->halt();

    }
}
