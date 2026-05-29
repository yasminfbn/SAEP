<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetalhesResource\Pages;
use App\Filament\Resources\DetalhesResource\RelationManagers;
use App\Models\Detalhes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetalhesResource extends Resource
{
    protected static ?string $model = Detalhes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nome_acessorio')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('modelo_aparelho')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('material')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('possui_garantia')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_acessorio')
                    ->label('Nome do Acessório')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modelo_aparelho')
                    ->label('Nome do Aparelho')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cor')
                    ->label('Cor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('material')
                    ->label('Material')
                    ->searchable(),
                Tables\Columns\IconColumn::make('possui_garantia')
                    ->label('Garantia')
                    ->boolean(),
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
            'index' => Pages\ListDetalhes::route('/'),
            'create' => Pages\CreateDetalhes::route('/create'),
            'edit' => Pages\EditDetalhes::route('/{record}/edit'),
        ];
    }
}
