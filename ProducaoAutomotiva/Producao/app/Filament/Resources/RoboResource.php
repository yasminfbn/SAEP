<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoboResource\Pages;
use App\Models\Robo;

use Filament\Forms;
use Filament\Forms\Form;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;

class RoboResource extends Resource
{
    protected static ?string $model = Robo::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    protected static ?string $navigationLabel = 'Robôs';

    protected static ?string $modelLabel = 'Robô';

    protected static ?string $pluralModelLabel = 'Robôs';

    protected static ?string $navigationGroup = 'Controle Industrial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Informações do Robô')
                    ->description('Cadastro dos robôs industriais.')
                    ->icon('heroicon-o-cog-6-tooth')

                    ->schema([

                        Forms\Components\TextInput::make('modelo')
                            ->label('Modelo')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('fabricante')
                            ->label('Fabricante')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('descricao')
                            ->label('Descrição')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                    ])

                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('modelo')
                    ->label('Modelo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('fabricante')
                    ->label('Fabricante')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('descricao')
                    ->label('Descrição')
                    ->limit(50)
                    ->searchable(),

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

            'index' => Pages\ListRobos::route('/'),

            'create' => Pages\CreateRobo::route('/create'),

            'edit' => Pages\EditRobo::route('/{record}/edit'),

        ];
    }
}