<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\AvailabilityResource\Pages\ListAvailabilities;
use App\Filament\Resources\AvailabilityResource\Pages\CreateAvailability;
use App\Filament\Resources\AvailabilityResource\Pages\EditAvailability;
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

    protected static ?string $modelLabel = 'Elérhetőség';

    protected static ?string $pluralModelLabel = 'Elérhetőségek';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('car_id')
                    ->relationship('car', 'model')
                    ->label('Autó model')
                    ->required(),
                DatePicker::make('date')
                    ->required(),
                Toggle::make('is_available'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('car.brand')->label('Márka')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('car.model')->label('Model')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('date')->label('Dátum')
                    ->date()
                    ->sortable(),
                ToggleColumn::make('is_available')->label('Elérhető')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('date_range')->form([
                    DatePicker::make('start_date')
                        ->label('Mettől')
                        ->required(),
                    DatePicker::make('end_date')
                        ->label('Meddig')
                        ->required(),
                ])->query(function ($query, array $data) {
                    return $query->when($data['start_date'], function ($query) use ($data): void {
                        $query->where('date', '>=', $data['start_date']);
                    })->when($data['end_date'], function ($query) use ($data): void {
                        $query->where('date', '<=', $data['end_date']);
                    });
                }),
                SelectFilter::make('car_model')
                    ->label('Model')
                    ->relationship('car', 'model')
                    ->preload(),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ListAvailabilities::route('/'),
            'create' => CreateAvailability::route('/create'),
            'edit' => EditAvailability::route('/{record}/edit'),
        ];
    }
}
