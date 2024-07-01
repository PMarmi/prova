<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjecteResource\Pages;
use App\Filament\Resources\ProjecteResource\RelationManagers;
use App\Models\Projecte;
use App\Models\Usuari;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
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
use PhpParser\Node\Stmt\Label;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;

class ProjecteResource extends Resource
{
    protected static ?string $model = Projecte::class;
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')
                    ->required()
                    ->label('Nom del Projecte')
                    ->autofocus()
                    ->placeholder('Escriu aquí el nom del projecte')
                    ->extraInputAttributes(['style' => 'font-weight: bolder; font-size: 1.1rem;'])
                    ->columnSpan(12),
                // Section::make('Rate limiting')
                //     // ->description('Prevent abuse by limiting the number of requests per period')
                //     ->schema([
                //         TextInput::make('nom')->columnSpan(6),
                //         TextInput::make('usuari_id')->columnSpan(2)
                //     ])->columns(8)->collapsed()->columnSpan(10),
                Select::make('usuari_id')
                    ->label('Usuari')
                    ->options(Usuari::pluck('nom', 'id'))
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
                TextColumn::make('usuari.nom')
                    ->label('Usuari')
                    ->sortable()
                    ->toggleable()
                    ->wrap()
                    ->searchable(),
                TextColumn::make('nom')
                    ->label('Nom del projecte')
                    ->sortable()
                    ->weight('bold')
                    ->size('xl')
                    ->color('primary')
                    ->wrap()
                    ->searchable(), 
                TextColumn::make('descripcio')
                    ->label(__("Descripció"))
                    ->wrap()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('usuari')->label('Usuari')
                    ->relationship('usuari', 'nom'),
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
            'index' => Pages\ListProjectes::route('/'),
            'create' => Pages\CreateProjecte::route('/create'),
            'view' => Pages\ViewProjecte::route('/{record}'),
            'edit' => Pages\EditProjecte::route('/{record}/edit'),
        ];
    }
}
