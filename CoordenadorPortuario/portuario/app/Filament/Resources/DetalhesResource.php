<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetalhesResource\Pages;
use App\Models\Detalhes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DetalhesResource extends Resource
{
    protected static ?string $model = Detalhes::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationLabel = 'Detalhes';

    protected static ?string $modelLabel = 'Detalhe';

    protected static ?string $pluralModelLabel = 'Detalhes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('codigo')
                    ->label('Código')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('tamanho')
                    ->label('Tamanho')
                    ->numeric()
                    ->suffix(' pés')
                    ->required(),

                Forms\Components\Select::make('tipo_carga')
                    ->label('Tipo de Carga')
                    ->options([
                        'Seca' => 'Seca',
                        'Refrigerada' => 'Refrigerada',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('nome_navio')
                    ->label('Nome do Navio')
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tamanho')
                    ->label('Tamanho')
                    ->suffix(' pés')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('tipo_carga')
                    ->label('Tipo de Carga')
                    ->colors([
                        'success' => 'Seca',
                        'warning' => 'Refrigerada',
                    ]),

                Tables\Columns\TextColumn::make('nome_navio')
                    ->label('Nome do Navio')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDetalhes::route('/'),
            'create' => Pages\CreateDetalhes::route('/create'),
            'edit' => Pages\EditDetalhes::route('/{record}/edit'),
        ];
    }
}

