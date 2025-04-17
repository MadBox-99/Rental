<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->visible(fn (): bool => Auth::user()->hasRole(['admin', 'super-admin']))
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('car_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('availability_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('customer_id')
                    ->numeric(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->required(),
                Forms\Components\TextInput::make('pickup_location_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('dropoff_location_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('pickup_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('dropoff_time')
                    ->required(),
                FileUpload::make('documents')->multiple(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = Auth::user();
        $userId = $user->id;

        return $table->modifyQueryUsing(function (Builder $query) use ($userId) {
            if (Auth::user()->hasRole(['admin', 'super-admin'])) {
                return $query;
            }

            return $query->whereUserId($userId);
        })
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('car_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('availability_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pickup_location_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dropoff_location_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pickup_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dropoff_time')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
