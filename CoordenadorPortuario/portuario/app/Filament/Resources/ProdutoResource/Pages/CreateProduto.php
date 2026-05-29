<?php

namespace App\Filament\Resources\ProdutoResource\Pages;

use App\Filament\Resources\ProdutoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;


class CreateProduto extends CreateRecord
{
    protected static string $resource = ProdutoResource::class;

    protected function beforeCreate(): void
    {
        $data = $this -> data;
        
        $codigoExistente = Produto::where('codigo', $data['codigo'])->exists();

        if ($codigoExistente) {

            Notification::make()
                ->title('Código já existente')
                ->body('Já existe um produto cadastrado com este código.')
                ->danger()
                ->send();

            $this->halt();
        }
    }
    
    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Deu tudo certo!')
            ->body('registro salvo com sucesso.')
            ->success()
            ->send();
    
        $this->halt();
    }
}
