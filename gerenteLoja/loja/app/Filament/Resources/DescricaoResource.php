<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DescricaoResource\Pages;
use App\Filament\Resources\DescricaoResource\RelationManagers;
use App\Models\Descricao;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DescricaoResource extends Resource
{
    protected static ?string $model = Descricao::class;
    protected static ?string $navigationLabel = 'Descrições';
    protected static ?string $modelLabel = 'Descrição';
    protected static ?string $pluralModelLabel = 'Descrições';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('controlado')
                    ->required(),
                Forms\Components\TextInput::make('loteFabricacao')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('dataValidade')
                    ->required(),
                Forms\Components\TextInput::make('principioAtivo')
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('codigo_id')
                    ->label('Código')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('controlado')
                    ->label('Controlado/Tarja Preta')
                    ->boolean(),
                Tables\Columns\TextColumn::make('loteFabricacao')
                    ->label('Lote de Fabricação')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dataValidade')
                    ->label('Data de Validade')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('principioAtivo')
                    ->label('Princípio Ativo')
                    ->searchable(),
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
