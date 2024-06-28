<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsuariResource\Pages;
use App\Filament\Resources\UsuariResource\RelationManagers;
use App\Models\Usuari;
use Faker\Core\Number;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsuariResource extends Resource
{
    protected static ?string $model = Usuari::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')
                ->required()
                ->label('Nom'),
                TextInput::make('edat')
                ->integer(1)
                ->numeric(1)
                ->minValue(0)
                ->maxValue(99)
                ->required()
                ->label('Edat'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom')
                ->label('Nom')
                ->sortable()
                ->searchable(),
                TextColumn::make('edat')
                ->label('Edat')
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUsuaris::route('/'),
            'create' => Pages\CreateUsuari::route('/create'),
            'view' => Pages\ViewUsuari::route('/{record}'),
            'edit' => Pages\EditUsuari::route('/{record}/edit'),
        ];
    }
}
