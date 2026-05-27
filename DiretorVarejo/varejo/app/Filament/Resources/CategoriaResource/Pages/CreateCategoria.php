<?php

namespace App\Filament\Resources\CategoriaResource\Pages;

use App\Filament\Resources\CategoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateCategoria extends CreateRecord
{
    protected static string $resource = CategoriaResource::class;
    protected function beforeCreate(): void
    {
        // Runs before the form fields are saved to the database.
    }

    protected function afterCreate(): void
    {
        Notification::make()
        -> title ("Deu tudo certo!")
        -> success()
        -> body('Registrado a nova categoria.')
        -> send();

        $this->halt();

    }
}
