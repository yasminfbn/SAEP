<?php

namespace App\Filament\Resources\DetalhesResource\Pages;

use App\Filament\Resources\DetalhesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\Produto;

class CreateDetalhes extends CreateRecord
{
    protected static string $resource = DetalhesResource::class;
    protected function beforeCreate(): void
    {
        $data = $this -> data;
        $codigo = Produto::where('codigo', $data['codigo'])->first();
        

        if(!$codigo){
            Notification::make()
            ->title('Código Inválido!')
            ->body('código não reconhecido.')
            ->success()
            ->send();
    
        $this->halt();
        }
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
            ->danger()
            ->send();
    
        $this->halt();
    }
}
