<?php

namespace App\Filament\Resources\DescricaoResource\Pages;

use App\Filament\Resources\DescricaoResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\Produto;

class CreateDescricao extends CreateRecord
{
    protected static string $resource = DescricaoResource::class;

    protected function beforeCreate(): void
    {
        $data = $this->data;

        // Busca pelo código corretamente
        $produto = Produto::where('codigo', $data['codigo'] ?? null)->first();

        // Captura o valor do estoque mínimo
        $estoqueMinimo = $data['estoqueMinimo'] ?? null;

        // Validação do código
        if (!$produto) {

            Notification::make()
                ->danger()
                ->title('Código não reconhecido!')
                ->body('O código informado não existe.')
                ->send();

            $this->halt();

            return;
        }

        // Validação do estoque mínimo
        if (!is_null($estoqueMinimo) && $estoqueMinimo < 0) {

            Notification::make()
                ->danger()
                ->title('Estoque inválido!')
                ->body('O estoque mínimo não pode ser menor que zero.')
                ->send();

            $this->halt();

            return;
        }
    }

    protected function afterCreate(): void
    {
        Notification::make()
            ->success()
            ->title('Sucesso!')
            ->body('Registro criado com sucesso.')
            ->send();
    }
}