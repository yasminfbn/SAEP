<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutosResource\Pages;
use App\Models\Produtos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdutosResource extends Resource
{
    protected static ?string $model = Produtos::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Produtos';

    protected static ?string $navigationGroup = 'Steel Works';

    protected static ?string $modelLabel = 'Produto';

    protected static ?string $pluralModelLabel = 'Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Informações do Produto')
                    ->description('Cadastro de matéria-prima e EPI')
                    ->icon('heroicon-o-cube')
                    ->schema([

                        Forms\Components\TextInput::make('nome')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('codigo')
                            ->label('Código')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('preco')
                            ->label('Preço')
                            ->numeric()
                            ->prefix('R$')
                            ->required(),

                        Forms\Components\TextInput::make('quantidade')
                            ->label('Quantidade')
                            ->numeric()
                            ->required(),

                    ])->columns(4),

                Forms\Components\Section::make('Categoria')
                    ->icon('heroicon-o-tag')
                    ->schema([

                        Forms\Components\Select::make('categoria')
                            ->label('Categoria')
                            ->options([
                                'Materia Prima' => 'Matéria-Prima',
                                'EPI' => 'EPI',
                            ])
                            ->required(),

                    ]),

                Forms\Components\Section::make('Matéria-Prima')
                    ->icon('heroicon-o-fire')
                    ->description('Dados da liga metálica')
                    ->schema([

                        Forms\Components\TextInput::make('tipo_liga')
                            ->label('Tipo de Liga')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('peso_toneladas')
                            ->label('Peso')
                            ->numeric()
                            ->suffix('Ton'),

                    ])->columns(2),

                Forms\Components\Section::make('EPI')
                    ->icon('heroicon-o-shield-check')
                    ->description('Equipamento de proteção')
                    ->schema([

                        Forms\Components\TextInput::make('CA')
                            ->label('Certificado de Aprovação')
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('validade')
                            ->label('Validade'),

                    ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([

                Tables\Columns\TextColumn::make('nome')
                    ->label('Produto')
                    ->searchable()
                    ->icon('heroicon-o-cube'),

                Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço')
                    ->money('BRL')
                    ->sortable()
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade')
                    ->sortable()
                    ->badge()
                    ->color('warning'),

                Tables\Columns\TextColumn::make('categoria')
                    ->label('Categoria')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'EPI' => 'danger',
                        default => 'primary',
                    }),

                Tables\Columns\TextColumn::make('tipo_liga')
                    ->label('Liga')
                    ->searchable(),

                Tables\Columns\TextColumn::make('peso_toneladas')
                    ->label('Peso')
                    ->suffix(' Ton')
                    ->sortable(),

                Tables\Columns\TextColumn::make('CA')
                    ->label('CA')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('validade')
                    ->label('Validade')
                    ->date('d/m/Y')
                    ->sortable(),

            ])

            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('warning'),
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateHeading('Nenhum produto cadastrado')
            ->emptyStateDescription('Cadastre um novo produto para a fundição.')
            ->emptyStateIcon('heroicon-o-cube');
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
            'create' => Pages\CreateProdutos::route('/create'),
            'edit' => Pages\EditProdutos::route('/{record}/edit'),
        ];
    }
}

