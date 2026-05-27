<?php

namespace App\Filament\Resources\DescricaoResource\Pages;

use App\Filament\Resources\DescricaoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\Produto;

class CreateDescricao extends CreateRecord
{
    protected static string $resource = DescricaoResource::class;
    protected function beforeCreate(): void
    {
        $data = $this -> data;
        $codigo = Produto::find($data['codigo'])->first();
        if(!$codigo){
            Notification::make()
                ->danger()
                ->title('Código não reconhecido!')
                ->body('Código inválido.')
                ->send();

                 $this -> halt();
            
        }
        if(empty($codigo)){
            Notification::make()
            ->danger()
            ->title('Código não reconhecido!')
            ->body('Preenchimento obrigatório.')
            ->send();
        }
    }

    protected function afterCreate(): void
    {
        Notification::make()
        ->success()
        ->title('Deu tudo certo!')
        ->body('Registrado com sucesso.')
        ->send();
    }
}
