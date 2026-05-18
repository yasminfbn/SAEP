<?php

namespace App\Filament\Resources\MovimentoResource\Pages;

use App\Filament\Resources\MovimentoResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Produto;
use Filament\Notifications\Notification;

class CreateMovimento extends CreateRecord
{
    protected static string $resource = MovimentoResource::class;

    // Antes de criar o movimento
    protected function beforeCreate(): void
    {
        $data = $this->data;

        // Busca o produto
        $produto = Produto::find($data['produto_id']);

        // Quantidade digitada
        $quantidade = (int) $data['quantidade'];

        // Tipo do movimento
        $tipo = $data['tipo'];

        // Verifica se o produto existe
        if (!$produto) {

            Notification::make()
                ->title('Produto não encontrado')
                ->body('Selecione um produto válido.')
                ->danger()
                ->send();

            $this->halt();

            return;
        }

        // Impede estoque negativo
        if (
            $tipo === 'saida' &&
            ($produto->estoque - $quantidade) < 0
        ) {

            Notification::make()
                ->title('Estoque insuficiente')
                ->body(
                    "O estoque de '{$produto->nome}' é de apenas {$produto->estoque} unidades."
                )
                ->danger()
                ->send();

            $this->halt();

            return;
        }
    }

    // Depois de criar o movimento
    protected function afterCreate(): void
    {
        $movimento = $this->getRecord();

        // Relacionamento com produto
        $produto = $movimento->produto;

        // Segurança extra
        if (!$produto) {

            Notification::make()
                ->title('Erro')
                ->body('Produto não encontrado.')
                ->danger()
                ->send();

            return;
        }

        // Entrada de estoque
        if ($movimento->tipo === 'entrada') {

            $produto->increment(
                'estoque',
                $movimento->quantidade
            );

        } 
        
        // Saída de estoque
        else {

            $produto->decrement(
                'estoque',
                $movimento->quantidade
            );
        }
    }
}