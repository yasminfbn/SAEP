<?php

namespace App\Filament\Resources\ProdutoResource\Pages;

use App\Models\Robo;
use App\Filament\Resources\RoboResource;
use Filament\Notifications\Notification;
use App\Filament\Resources\ProdutoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduto extends CreateRecord
{
    protected static string $resource = ProdutoResource::class;

    protected function beforeCreate(): void
    {
        $robo = Robo::find($this->data['robo_id']);

        if (!$robo) {

            Notification::make()
                ->title('Erro!')
                ->body('O ID do robô não existe.')
                ->danger()
                ->send();

            $this->halt();
        }
    }

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Registrado!')
            ->success()
            ->send();
    }
}