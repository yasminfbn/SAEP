<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoResource\Pages;
use App\Models\Produto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    // =========================
    // FORMULÁRIO
    // =========================
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nome')
                ->label('Nome')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('codigo')
                ->label('Código')
                ->required()
                ->numeric(),

            Forms\Components\TextInput::make('fabricante')
                ->label('Fabricante')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('quantidade')
                ->label('Quantidade')
                ->required()
                ->numeric(),

            Forms\Components\TextInput::make('preco')
                ->label('Preço')
                ->required()
                ->numeric(),

            Forms\Components\TextInput::make('temperatura')
                ->label('Temperatura')
                ->required()
                ->numeric(),

            Forms\Components\TextInput::make('validade')
                ->label('Validade')
                ->required()
                ->maxLength(255),

            // 🔥 AQUI está a correção principal
            Forms\Components\Select::make('categoria_id')
                ->label('Categoria')
                ->relationship('categoria', 'categoria')
                ->required(),
        ]);
    }

    // =========================
    // TABELA
    // =========================
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable(),

                Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->sortable(),

                Tables\Columns\TextColumn::make('fabricante')
                    ->label('Fabricante')
                    ->searchable(),

                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade')
                    ->sortable(),

                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço')
                    ->sortable(),

                Tables\Columns\TextColumn::make('temperatura')
                    ->label('Temperatura')
                    ->sortable(),

                Tables\Columns\TextColumn::make('validade')
                    ->label('Validade'),

                Tables\Columns\TextColumn::make('categoria.categoria')
                    ->label('Categoria')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProduto::route('/create'),
            'edit' => Pages\EditProduto::route('/{record}/edit'),
        ];
    }
}