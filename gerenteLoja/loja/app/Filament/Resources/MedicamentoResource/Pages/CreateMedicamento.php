<?php

namespace App\Filament\Resources\MedicamentoResource\Pages;

use App\Filament\Resources\MedicamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateMedicamento extends CreateRecord
{
    protected static string $resource = MedicamentoResource::class;
    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Deu tudo certo!')
            ->body('Medicamento registrado.')
            ->success()
            ->send();
    }
}
