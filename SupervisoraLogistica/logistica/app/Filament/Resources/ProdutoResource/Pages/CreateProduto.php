<?php

namespace App\Filament\Resources\ProdutoResource\Pages;

use App\Filament\Resources\ProdutoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateProduto extends CreateRecord
{
    protected static string $resource = ProdutoResource::class;


    protected function afterCreate(): void
    {
        Notification::make()
        ->title('Deu tudo certo!')
        ->body('Produto Registrado.')
        ->success()
        ->send();

        $this->halt();
    }
}
