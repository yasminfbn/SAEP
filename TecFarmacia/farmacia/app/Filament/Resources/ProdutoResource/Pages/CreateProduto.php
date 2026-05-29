<?php

namespace App\Filament\Resources\ProdutoResource\Pages;

use App\Filament\Resources\ProdutoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\Produto;

class CreateProduto extends CreateRecord
{
    protected static string $resource = ProdutoResource::class;
    protected function beforeCreate(): void
    {
        $data = $this -> data;
        $codigo = Produto::where('codigo', $data['codigo'])->first();

        if(empty($data['codigo'])){
            Notification::make()
            ->title('Código Inválido')
            ->body('Preenchimento obrigatório')
            ->danger()
            ->send();

            $this -> halt();
        }

     
    }
    protected function afterCreate(): void
    {
        Notification::make()
        ->title('Deu tudo certo!')
        ->body('Registrado com sucesso.')
        ->success()
        ->send();  
    }
}
