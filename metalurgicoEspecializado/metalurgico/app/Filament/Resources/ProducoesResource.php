<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProducoesResource\Pages;
use App\Models\Producoes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProducoesResource extends Resource
{
    protected static ?string $model = Producoes::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';

    protected static ?string $navigationLabel = 'Produções';

    protected static ?string $modelLabel = 'Produção';

    protected static ?string $pluralModelLabel = 'Produções';

    protected static ?string $navigationGroup = 'Steel Works';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Dados da Produção')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->description('Controle da fundição industrial')
                    ->schema([

                        Forms\Components\DatePicker::make('data')
                            ->label('Data')
                            ->required(),

                        Forms\Components\TextInput::make('operador')
                            ->label('Operador')
                            ->placeholder('Marcos Trovão')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('forno')
                            ->label('Forno')
                            ->placeholder('Forno Industrial')
                            ->required()
                            ->maxLength(255),

                    ])->columns(3),

                Forms\Components\Section::make('Monitoramento')
                    ->icon('heroicon-o-fire')
                    ->description('Dados da produção')
                    ->schema([

                        Forms\Components\TextInput::make('temperatura_registrada')
                            ->label('Temperatura')
                            ->numeric()
                            ->suffix('°C')
                            ->required(),

                        Forms\Components\TextInput::make('quantidade_produzida')
                            ->label('Quantidade')
                            ->numeric()
                            ->suffix('Ton')
                            ->required(),

                        Forms\Components\TextInput::make('produto_id')
                            ->label('Produto ID')
                            ->numeric()
                            ->required(),

                    ])->columns(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([

                Tables\Columns\TextColumn::make('data')
                    ->label('Data')
                    ->date('d/m/Y')
                    ->sortable()
                    ->badge()
                    ->color('warning'),

                Tables\Columns\TextColumn::make('operador')
                    ->label('Operador')
                    ->icon('heroicon-o-user')
                    ->searchable(),

                Tables\Columns\TextColumn::make('forno')
                    ->label('Forno')
                    ->icon('heroicon-o-fire')
                    ->searchable(),

                Tables\Columns\TextColumn::make('temperatura_registrada')
                    ->label('Temperatura')
                    ->suffix(' °C')
                    ->badge()
                    ->color('danger')
                    ->sortable(),

                Tables\Columns\TextColumn::make('quantidade_produzida')
                    ->label('Produção')
                    ->suffix(' Ton')
                    ->badge()
                    ->color('success')
                    ->sortable(),

                Tables\Columns\TextColumn::make('produto_id')
                    ->label('Produto')
                    ->badge()
                    ->color('info'),

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

            ->emptyStateHeading('Nenhuma produção encontrada')
            ->emptyStateDescription('Cadastre uma nova produção.')
            ->emptyStateIcon('heroicon-o-fire');
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
            'index' => Pages\ListProducoes::route('/'),
            'create' => Pages\CreateProducoes::route('/create'),
            'edit' => Pages\EditProducoes::route('/{record}/edit'),
        ];
    }
}

