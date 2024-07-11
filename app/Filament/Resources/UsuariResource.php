<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsuariResource\Pages;
use App\Filament\Resources\UsuariResource\RelationManagers;
use App\Models\Usuari;
use Faker\Core\Number;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsuariResource extends Resource
{
    protected static ?string $model = Usuari::class;
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')
                ->required()
                ->autofocus()
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
                TextColumn::make('id')
                    ->label('ID')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nom')
                    ->label('Nom')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('edat')
                    ->label('Edat')
                    ->sortable()
                    // ->searchable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([            
                Filter::make('created_at')
                ->form([
                    TextInput::make('edat_desde')->label('Edat Des de')
                    ->integer()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(99),
                    TextInput::make('edat_hasta')->label('Edat Fins a')
                    ->integer()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(99),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['edat_desde'],
                            fn (Builder $query, $date): Builder => $query->where('edat', '>=', $data['edat_desde']),
                            )
                        ->when(
                            $data['edat_hasta'],
                            fn (Builder $query, $date): Builder => $query->where('edat', '<=', $data['edat_hasta']),
                        );
                })
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('')->tooltip('Ver'),
                Tables\Actions\EditAction::make()->label('')->tooltip('Editar'),
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
