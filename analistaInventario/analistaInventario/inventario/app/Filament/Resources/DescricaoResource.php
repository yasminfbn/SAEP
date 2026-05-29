<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DescricaoResource\Pages;
use App\Models\Descricao;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DescricaoResource extends Resource
{
    protected static ?string $model = Descricao::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('marca')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('estoqueMinimo')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                // Campo de unidade de medida
                Forms\Components\Select::make('medida')
                    ->label('Unidade de Medida')
                    ->options([
                        'Kg' => 'Kg',
                        'Litro' => 'Litro',
                        'Unidade' => 'Unidade',
                    ])
                    ->required()
                    ->searchable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('codigo')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('marca')
                    ->searchable(),

                Tables\Columns\TextColumn::make('estoqueMinimo')
                    ->sortable(),

                Tables\Columns\TextColumn::make('medida')
                    ->label('Unidade'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDescricaos::route('/'),
            'create' => Pages\CreateDescricao::route('/create'),
            'edit' => Pages\EditDescricao::route('/{record}/edit'),
        ];
    }
}