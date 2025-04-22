<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Rendelések';

    protected static ?string $navigationLabel = 'Rendelések';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Felhasználó')
                    ->visible(fn (): bool => Auth::user()->hasRole(['admin', 'super-admin']))
                    ->required(fn (): bool => Auth::user()->hasRole(['admin', 'super-admin']))
                    ->relationship('user', 'name'),
                Select::make('car_id')
                    ->label('Autó')
                    ->required()
                    ->relationship('car', 'model'),
                Select::make('customer_id')
                    ->label('Ügyfél')
                    ->relationship('customer', 'first_name')
                    ->createOptionForm([
                        TextInput::make('first_name')
                            ->label('Keresztnév')
                            ->required(),
                        TextInput::make('last_name')
                            ->label('Vezetéknév')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telefonszám')
                            ->tel()
                            ->required(),
                    ]),
                TextInput::make('own_license_plate')
                    ->label('Saját rendszám')
                    ->columnSpan(2)
                    ->maxLength(255),
                DatePicker::make('start_date')
                    ->label('Kezdési dátum')
                    ->required(),
                DatePicker::make('end_date')
                    ->label('Befejezési dátum')
                    ->required(),
                TextInput::make('pickup_location_id')
                    ->label('Felvételi hely')
                    ->visible(false),
                TextInput::make('dropoff_location_id')
                    ->label('Leadási hely')
                    ->visible(false),

                TimePicker::make('pickup_time')
                    ->label('Felvételi idő')
                    ->seconds(false)
                    ->required(),
                TimePicker::make('dropoff_time')
                    ->label('Leadási idő')
                    ->seconds(false)
                    ->required(),

                FileUpload::make('document_contract')
                    ->label('Szerződés')
                    ->multiple()
                    ->preserveFilenames()
                    ->directory('orders')
                    ->openable(),
                FileUpload::make('document_declaration')
                    ->label('Nyilatkozat')
                    ->multiple()
                    ->preserveFilenames()
                    ->directory('orders')
                    ->openable(),

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
                TextColumn::make('user_id')
                    ->label('Felhasználó')
                    ->visible(fn (): bool => Auth::user()->hasRole(['admin', 'super-admin']))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('car.model')
                    ->label('Autó')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('customer.full_name')
                    ->label('Ügyfél neve')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('start_date')
                    ->label('Kezdési dátum')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('Befejezési dátum')
                    ->date()
                    ->sortable(),
                TextColumn::make('pickup_location_id')
                    ->label('Felvételi hely')
                    ->visible(false)
                    ->numeric()
                    ->sortable(),
                TextColumn::make('dropoff_location_id')
                    ->label('Leadási hely')
                    ->visible(false)
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pickup_time')
                    ->label('Felvételi idő')
                    ->time()
                    ->sortable(),
                TextColumn::make('dropoff_time')
                    ->label('Leadási idő')
                    ->time()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Létrehozva')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Módosítva')
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
