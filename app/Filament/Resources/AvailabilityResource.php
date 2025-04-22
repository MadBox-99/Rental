<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvailabilityResource\Pages;
use App\Models\Availability;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class AvailabilityResource extends Resource
{
    protected static ?string $model = Availability::class;

    protected static ?string $navigationGroup = 'Autók';

    protected static ?string $navigationLabel = 'Elérhetőségek';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('car_id')
                    ->relationship('car', 'model')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\Toggle::make('is_available'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('car.brand')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('car.model')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                ToggleColumn::make('is_available'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('date_range')->form([
                    Forms\Components\DatePicker::make('start_date')
                        ->label('Mettől')
                        ->required(),
                    Forms\Components\DatePicker::make('end_date')
                        ->label('Meddig')
                        ->required(),
                ])->query(function ($query, array $data) {
                    return $query->when($data['start_date'], function ($query) use ($data) {
                        $query->where('date', '>=', $data['start_date']);
                    })->when($data['end_date'], function ($query) use ($data) {
                        $query->where('date', '<=', $data['end_date']);
                    });
                }),
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
            'index' => Pages\ListAvailabilities::route('/'),
            'create' => Pages\CreateAvailability::route('/create'),
            'edit' => Pages\EditAvailability::route('/{record}/edit'),
        ];
    }
}
