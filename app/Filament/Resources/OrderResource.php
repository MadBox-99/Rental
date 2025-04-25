<?php

namespace App\Filament\Resources;

use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\OrderResource\Pages\ListOrders;
use App\Filament\Resources\OrderResource\Pages\CreateOrder;
use App\Filament\Resources\OrderResource\Pages\EditOrder;
use DateTimeInterface;
use Carbon\WeekDay;
use Carbon\Month;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Availability;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\HasFilters;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
{
    use HasFilters;

    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Rendelések';

    protected static ?string $navigationLabel = 'Rendelések';

    protected static ?string $modelLabel = 'Rendelés';

    protected static ?string $pluralModelLabel = 'Rendelések';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Felhasználó')
                    ->visible(fn (): bool => Auth::user()->hasRole(['admin', 'super-admin']))
                    // ->required(fn (): bool => Auth::user()->hasRole(['admin', 'super-admin']))
                    ->relationship('user', 'name'),
                Select::make('car_id')
                    ->label('Autó')
                    ->live()
                    ->required()
                    ->relationship('car', 'model'),
                Select::make('customer_id')
                    ->required()
                    ->preload()
                    ->label('Bérlő')
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
                            ->unique(Customer::class, 'email')
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telefonszám')
                            ->tel()
                            ->required(),
                    ])->createOptionUsing(function (array $data): int {
                        $data['user_id'] = Auth::user()->id;

                        return Customer::create($data)->id;
                    }),
                TextInput::make('own_license_plate')
                    ->label('Saját rendszám')
                    ->columnSpan(2)
                    ->maxLength(255),
                DatePicker::make('start_date')
                    ->disabledDates(function (Get $get) {
                        return Availability::whereCarId($get)->whereIsAvailable(false)->pluck('date')->toArray();
                    })
                    ->label('Kezdési dátum')
                    ->required(),
                DatePicker::make('end_date')
                    ->disabledDates(function (Get $get) {
                        return Availability::whereCarId($get)->whereIsAvailable(false)->pluck('date')->toArray();
                    })
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
        })->header(function ($livewire) {
            $month = $livewire->tableFilters['month']['month'] ?? now()->format('Y-m');
            $data = self::getAvailableCarsData($month);

            return view('components.available-cars-chart', $data);
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
                    ->label('Bérlő neve')
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
                Filter::make('month')
                    ->label('Hónap')
                    ->form([
                        Select::make('month')
                            ->label('Válassz hónapot')
                            ->options(
                                collect(range(0, 5))->mapWithKeys(function ($i) {
                                    $date = now()->addMonths($i);

                                    return [$date->format('Y-m') => $date->format('Y. F')];
                                })->toArray()
                            )
                            ->default(now()->format('Y-m')),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (! empty($data['month'])) {
                            $startOfMonth = Carbon::parse($data['month'])->startOfMonth();
                            $endOfMonth = Carbon::parse($data['month'])->endOfMonth();

                            return $query->whereBetween('start_date', [$startOfMonth, $endOfMonth]);
                        }
                    }),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getAvailableCarsData(DateTimeInterface|WeekDay|Month|string|int|float|null $month): array
    {
        $startOfMonth = Carbon::parse($month)->startOfMonth();
        $endOfMonth = Carbon::parse($month)->endOfMonth();
        $dates = Carbon::parse($startOfMonth)->daysUntil($endOfMonth);

        $cars = Car::all()->map(function ($car) use ($dates): Car {
            $car->availability = $dates->map(function ($date) use ($car) {
                $isAvailable = ! $car->availabilities->whereDate('date', '<=', $date)
                    ->whereDate('date', '>=', $date)
                    ->exists();

                return [$date->format('Y-m-d') => $isAvailable];
            });

            return $car;
        });

        return ['dates' => $dates, 'cars' => $cars];
    }
}
