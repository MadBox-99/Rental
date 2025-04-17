<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvailabilityResource\Pages;
use App\Models\Availability;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AvailabilityResource extends Resource
{
    protected static ?string $model = Availability::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('car_id')
                    ->relationship('car', 'id')
                    ->required(),
                Forms\Components\DateTimePicker::make('start_time')
                    ->required()
                    ->displayFormat('Y-m-d H:00') // Csak nap és óra
                    ->format('Y-m-d H:00'), // Mentéskor is csak nap és óra
                Forms\Components\DateTimePicker::make('end_time')
                    ->required()
                    ->displayFormat('Y-m-d H:00') // Csak nap és óra
                    ->format('Y-m-d H:00'),
                Forms\Components\Toggle::make('is_available')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('car.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime('Y-m-d H:00') // Csak nap és óra
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_time')
                    ->dateTime('Y-m-d H:00') // Csak nap és óra
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_available')
                    ->boolean(),
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
            'index' => Pages\ListAvailabilities::route('/'),
            'create' => Pages\CreateAvailability::route('/create'),
            'edit' => Pages\EditAvailability::route('/{record}/edit'),
        ];
    }
}
