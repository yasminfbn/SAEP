<?php

namespace App\Filament\Resources\ProdutoResource\Pages;

use App\Filament\Resources\ProdutoResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateProduto extends CreateRecord
{
    protected static string $resource = ProdutoResource::class;

    protected function beforeCreate(): void
    {
        $data = $this->data;

        // Validação do nome
        if (empty($data['nome'])) {

            Notification::make()
                ->title('Nome inválido')
                ->body('O campo nome é obrigatório.')
                ->danger()
                ->send();

            $this->halt();
        }


        if (empty($data['codigo'])) {

            Notification::make()
                ->title('Código inválido')
                ->body('O campo código é obrigatório.')
                ->danger()
                ->send();

            $this->halt();

        if (empty($data['fabricante'])) {

            Notification::make()
                ->title('Fabricante inválido')
                ->body('O campo fabricante é obrigatório.')
                ->danger()
                ->send();

            $this->halt();
        }

        // Validação da quantidade
        if ($data['quantidade'] <= 0) {

            Notification::make()
                ->title('Quantidade inválida')
                ->body('A quantidade deve ser maior que zero.')
                ->danger()
                ->send();

            $this->halt();
        }


        if ($data['preco'] <= 0) {

            Notification::make()
                ->title('Preço inválido')
                ->body('O preço deve ser maior que zero.')
                ->danger()
                ->send();

            $this->halt();
        }
    }

}
    protected function afterCreate(): void
        {
            Notification::make()
                ->title('Produto cadastrado')
                ->body('O produto foi cadastrado com sucesso.')
                ->success()
                ->send();
        }
}

