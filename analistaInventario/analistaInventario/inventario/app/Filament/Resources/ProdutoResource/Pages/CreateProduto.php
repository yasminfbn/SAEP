<?php

namespace App\Filament\Resources\ProdutoResource\Pages;

use App\Filament\Resources\ProdutoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduto extends CreateRecord
{
    protected static string $resource = ProdutoResource::class;
    protected function afterCreate(): void
    {
        Notification::make()
            ->success()
            ->title('Deu tudo certo!')
            ->body('Produto criado com sucesso.')
            ->send();
    }
}
