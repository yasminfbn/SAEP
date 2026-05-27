<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicamentoResource\Pages;
use App\Filament\Resources\MedicamentoResource\RelationManagers;
use App\Models\Medicamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedicamentoResource extends Resource
{
    protected static ?string $model = Medicamento::class;
    protected static ?string $navigationLabel = 'Medicamentos';
    protected static ?string $modelLabel = 'Medicamento';
    protected static ?string $pluralModelLabel = 'Medicamentos';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('fabricante')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantidade')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fabricante')
                    ->label('Fabricante/Fornecedor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço')
                    ->numeric()
                    ->money('BRL')
                    ->sortable(),
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
            'index' => Pages\ListMedicamentos::route('/'),
            'create' => Pages\CreateMedicamento::route('/create'),
            'edit' => Pages\EditMedicamento::route('/{record}/edit'),
        ];
    }
}
