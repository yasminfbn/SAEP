<?php

namespace App\Filament\Resources;

use App\Models\Movimento;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

use Filament\Actions\EditAction;

use App\Filament\Resources\MovimentoResource\Pages;

class MovimentoResource extends Resource
{
    protected static ?string $model = Movimento::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static ?string $navigationLabel = 'Movimentos';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('produto_id')
                    ->relationship('produto', 'nome')
                    ->label('Produto')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('tipo')
                    ->options([
                        'entrada' => 'Entrada',
                        'saida' => 'Saída',
                    ])
                    ->required(),

                TextInput::make('quantidade')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('produto.nome')
                    ->label('Produto'),

                TextColumn::make('tipo'),

                TextColumn::make('quantidade'),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMovimentos::route('/'),
            'create' => Pages\CreateMovimento::route('/create'),
            'edit' => Pages\EditMovimento::route('/{record}/edit'),
        ];
    }
}