<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TascasResource\Pages;
use App\Filament\Resources\TascasResource\RelationManagers;
use App\Models\Tasca;
use App\Models\Projecte;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;

class TascasResource extends Resource
{
    protected static ?string $model = Tasca::class;
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')
                    ->label('Nom de la tasca')
                    ->required()
                    ->autofocus()
                    ->columnSpan(9),
                Select::make('projecte_id')
                    ->label('Projecte')
                    ->options(Projecte::pluck('nom', 'id'))
                    ->searchable()
                    ->required()
                    ->columnSpan(3),
                Textarea::make('descripcio')
                    ->label('Descripció')
                    ->columnSpan(12),
            ])->columns(12);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('projecte.nom')
                    ->label('Nom del projecte')
                    ->sortable()
                    ->wrap()
                    ->searchable(),
                TextColumn::make('nom')
                    ->label('Nom de la Tasca')
                    ->sortable()
                    ->weight('bold')
                    ->size('xl')
                    ->color('primary')
                    ->wrap()
                    // ->searchable()
                    ->searchable(isIndividual: true, isGlobal: true)
                    , 
                TextColumn::make('descripcio')
                    ->label(__("Descripció"))
                    ->wrap()
                    ->searchable(isIndividual: true, isGlobal: true),
            ])
            ->filters([
                SelectFilter::make('projecte')
                    ->label('Projecte')
                    ->searchable()
                    ->preload()
                    ->relationship('projecte', 'nom'),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')->label('Creado desde'),
                        DatePicker::make('created_until')->label('Creado hasta'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
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
            'index' => Pages\ListTascas::route('/'),
            'create' => Pages\CreateTascas::route('/create'),
            'view' => Pages\ViewTascas::route('/{record}'),
            'edit' => Pages\EditTascas::route('/{record}/edit'),
        ];
    }
}
