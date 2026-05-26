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

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Produtos';

    protected static ?string $modelLabel = 'Produto';

    protected static ?string $pluralModelLabel = 'Produtos';

    protected static ?string $navigationGroup = 'Controle Industrial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Informações do Produto')
                    ->description('Cadastro completo de produtos industriais.')
                    ->icon('heroicon-o-wrench-screwdriver')

                    ->schema([

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

                        Forms\Components\TextInput::make('preco')
                            ->label('Preço')
                            ->required()
                            ->numeric()
                            ->prefix('R$'),

                        Forms\Components\TextInput::make('quantidade')
                            ->label('Quantidade')
                            ->required()
                            ->numeric(),

                        Forms\Components\TextInput::make('numero_serie')
                            ->label('Número de Série')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('vida_util_horas')
                            ->label('Vida Útil (Horas)')
                            ->required()
                            ->numeric(),

                        Forms\Components\TextInput::make('localizacao')
                            ->label('Localização')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('robo_id')
                            ->label('ID do Robô')
                            ->required()
                            ->numeric(),

                    ])

                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('fabricante')
                    ->label('Fabricante')
                    ->searchable(),

                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço')
                    ->money('BRL')
                    ->sortable(),

                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade')
                    ->sortable(),

                Tables\Columns\TextColumn::make('numero_serie')
                    ->label('Número Série')
                    ->searchable(),

                Tables\Columns\TextColumn::make('vida_util_horas')
                    ->label('Vida Útil')
                    ->sortable(),

                Tables\Columns\TextColumn::make('localizacao')
                    ->label('Localização')
                    ->searchable(),

                Tables\Columns\TextColumn::make('robo_id')
                    ->label('ID Robô')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),

            ])

            ->filters([
                //
            ])

            ->actions([

                Tables\Actions\EditAction::make()
                    ->color('warning'),

                Tables\Actions\DeleteAction::make()
                    ->color('danger'),

            ])

            ->bulkActions([

                Tables\Actions\BulkActionGroup::make([

                    Tables\Actions\DeleteBulkAction::make(),

                ]),

            ])

            ->striped();
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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