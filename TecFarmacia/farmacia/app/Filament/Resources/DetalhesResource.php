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

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

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

                Forms\Components\Select::make('periculosidade')
                    ->label('Periculosidade')
                    ->options([
                        'Corrosivo' => 'Corrosivo',
                        'Inflamável' => 'Inflamável',
                        'Tóxico' => 'Tóxico',
                    ])
                    ->required(),

                Forms\Components\Select::make('temperatura')
                    ->label('Temperatura')
                    ->options([
                        '2°C a 8°C' => '2°C a 8°C',
                        '15°C a 25°C' => '15°C a 25°C',
                        '-20°C' => '-20°C',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('volume')
                    ->label('Volume')
                    ->numeric()
                    ->suffix('mL')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('codigo')
                    ->label('Código')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('periculosidade')
                    ->label('Periculosidade')
                    ->colors([
                        'danger' => 'Corrosivo',
                        'warning' => 'Inflamável',
                        'success' => 'Tóxico',
                    ]),

                Tables\Columns\TextColumn::make('temperatura')
                    ->label('Temperatura')
                    ->badge(),

                Tables\Columns\TextColumn::make('volume')
                    ->label('Volume')
                    ->suffix(' mL')
                    ->numeric()
                    ->sortable(),

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

