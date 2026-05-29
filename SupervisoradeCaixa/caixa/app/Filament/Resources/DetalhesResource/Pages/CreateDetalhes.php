<?php

namespace App\Filament\Resources\DetalhesResource\Pages;

use App\Filament\Resources\DetalhesResource;
use App\Models\Produtos;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateDetalhes extends CreateRecord
{
    protected static string $resource = DetalhesResource::class;

    protected function beforeCreate(): void
    {
        $data = $this->data;

        if (empty($data['codigo'])) {

            Notification::make()
                ->title('Código inválido')
                ->body('O campo código é obrigatório.')
                ->danger()
                ->send();

            $this->halt();
        }

        // Procura o produto pelo código
        $produto = Produtos::where('codigo', $data['codigo'])->first();

        // Verifica se o produto existe
        if (!$produto) {

            Notification::make()
                ->title('Produto não encontrado')
                ->body('O código informado não existe.')
                ->danger()
                ->send();

            $this->halt();
        }
    }

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Detalhe cadastrado')
            ->body('O detalhe foi cadastrado com sucesso.')
            ->success()
            ->send();
    }
}

