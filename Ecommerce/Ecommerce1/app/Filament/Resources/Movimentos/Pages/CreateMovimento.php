<?php

namespace App\Filament\Resources\Movimentos\Pages;

use App\Filament\Resources\Movimentos\MovimentoResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Produto;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;

class CreateMovimento extends CreateRecord
{
    protected static string $resource = MovimentoResource::class;

    protected function beforeCreate():void
    {
        $data = $this->data;

        $produto = Produto::find($data['produto_id']);

        $quantidade = (int) $data['quantidade'];
        $tipo = $data['tipo'];

        if ($tipo === 'saida' && $quantidade > $produto->estoque) {

            Notification::make()
                ->title('Estoque insuficiente.')
                ->body("O estoque de '{$produto->nome}' é de apenas {$produto->estoque} unidades.")
                ->danger()
                ->send();

            this -> halt();
        }
    }

    protected function afterCreate(): void
    {
        $movimento = $this->getRecord();

        $produto = $movimento->produto;

        if ($movimento->tipo === 'entrada') {

            $produto->increment('estoque', $movimento->quantidade);

        } else {

            $produto->decrement('estoque', $movimento->quantidade);
        }
    }
}