<?php

namespace App\Filament\Resources\DescricaoResource\Pages;

use App\Filament\Resources\DescricaoResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Medicamento;
use Filament\Notifications\Notification;

class CreateDescricao extends CreateRecord
{
    protected static string $resource = DescricaoResource::class;

    protected function beforeCreate(): void
    {
        $data = $this->data;

        $medicamento = Medicamento::where('codigo', $data['codigo_id'])->first();
        if (!$medicamento) {

            Notification::make()
                ->title('Código incorreto!')
                ->body('O código não foi reconhecido.')
                ->danger()
                ->send();

            $this->halt();

            return;

            if(empty($medicamento)){
                Notification::make()
                ->title('O código não pode estar vazio!')
                ->body('O código não foi reconhecido.')
                ->danger()
                ->send();
            }
        }
    }

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Deu tudo certo!')
            ->body('Descrição do Medicamento registrado.')
            ->success()
            ->send();
    }
}