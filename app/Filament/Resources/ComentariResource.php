<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComentariResource\Pages;
use App\Filament\Resources\ComentariResource\RelationManagers;
use App\Models\Comentari;
use App\Models\Tasca;
use App\Models\Usuari;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComentariResource extends Resource
{
    protected static ?string $model = Comentari::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('contingut')
                    ->label('Comentari')
                    ->required()
                    ->autofocus()
                    ->columnSpan(9),
                Select::make('tasca_id')
                    ->label('Tasca')
                    ->options(Tasca::pluck('nom', 'id'))
                    ->searchable()
                    ->required()
                    ->columnSpan(3),
                Select::make('usuari_id')
                    ->label('Usuari')
                    ->options(Usuari::pluck('nom', 'id'))
                    ->searchable()
                    ->required()
                    ->columnSpan(3),
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tasca.nom')
                    ->label('Tasca')
                    ->sortable()
                    ->toggleable()
                    ->wrap()
                    ->searchable(),
                TextColumn::make('usuari.nom')
                    ->label('Usuari')
                    ->sortable()
                    ->toggleable()
                    ->wrap()
                    ->searchable(),
                TextColumn::make('contingut')
                    ->label(__("Comentari"))
                    ->wrap()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListComentaris::route('/'),
            'create' => Pages\CreateComentari::route('/create'),
            'view' => Pages\ViewComentari::route('/{record}'),
            'edit' => Pages\EditComentari::route('/{record}/edit'),
        ];
    }
}
