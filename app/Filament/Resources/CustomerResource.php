<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages\CreateCustomer;
use App\Filament\Resources\CustomerResource\Pages\EditCustomer;
use App\Filament\Resources\CustomerResource\Pages\ListCustomers;
use App\Models\Customer;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationGroup = 'Bérlők';

    protected static ?string $navigationLabel = 'Bérlők';

    protected static ?string $modelLabel = 'Bérlő';

    protected static ?string $pluralModelLabel = 'Bérlők';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->visible(fn (): bool => Auth::user()->hasRole(['admin', 'super-admin']))
                    ->relationship('user', 'name')
                    ->required(fn (): bool => Auth::user()->hasRole(['admin', 'super-admin']))
                    ->default(Auth::user()->id),
                TextInput::make('first_name')
                    ->live()
                    ->label('Vezetéknév')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->live()
                    ->label('Keresztnév')
                    ->required()
                    ->maxLength(255),
                TextInput::make('full_name')
                    ->label('Teljes név')
                    ->reactive()
                    ->disabled(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Telefonszám')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                TextInput::make('address')
                    ->label('Cím')
                    ->maxLength(255),
                TextInput::make('address_number')
                    ->label('Házszám')
                    ->maxLength(255),
                TextInput::make('address_extra')
                    ->label('Emelet/Ajtó')
                    ->maxLength(255),
                TextInput::make('city')
                    ->label('Város')
                    ->maxLength(255),
                TextInput::make('postal_code')
                    ->label('Irányítószám')
                    ->maxLength(255),
                TextInput::make('born_place')
                    ->label('Születési hely')
                    ->maxLength(255),
                TextInput::make('born_year')
                    ->label('Születési év')
                    ->maxLength(4),
                TextInput::make('born_month')
                    ->label('Születési hónap')
                    ->maxLength(2),
                TextInput::make('born_day')
                    ->label('Születési nap')
                    ->maxLength(2),
                TextInput::make('mother_name')
                    ->label('Anyja neve')
                    ->maxLength(255),
                TextInput::make('license_number')
                    ->label('Jogosítvány száma')
                    ->maxLength(255),
                DatePicker::make('license_issue_date')
                    ->label('Jogosítvány kiállításának dátuma')
                    ->date(),
                DatePicker::make('license_expiry_date')
                    ->label('Jogosítvány lejárati dátuma')
                    ->date(),
                TextInput::make('id_card_number')
                    ->label('Személyigazolvány szám')
                    ->maxLength(255),

                FileUpload::make('files')
                    ->label('Fájlok')
                    ->multiple()
                    ->preserveFilenames()
                    ->disabled(fn (Get $get): bool => $get('first_name') === null || $get('last_name') === null)
                    ->directory('customers')
                    ->openable()
                    ->downloadable()
                    ->reorderable()
                    ->maxFiles(10)
                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                    ->maxSize(1024 * 10),
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
        })->columns([
            TextColumn::make('user.name')
                ->numeric()
                ->sortable(),
            TextColumn::make('first_name')
                ->translateLabel()
                ->searchable(),
            TextColumn::make('last_name')
                ->translateLabel()
                ->searchable(),
            TextColumn::make('email')->translateLabel()
                ->translateLabel()
                ->searchable(),
            TextColumn::make('phone')->translateLabel()
                ->translateLabel()
                ->searchable(),
            TextColumn::make('address')->translateLabel()
                ->translateLabel()
                ->searchable(),
            TextColumn::make('city')->translateLabel()
                ->translateLabel()
                ->searchable(),
            TextColumn::make('postal_code')->translateLabel()
                ->translateLabel()
                ->searchable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])->filters([
            //
        ])->actions([
            EditAction::make(),
        ])->bulkActions([
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
            'index' => ListCustomers::route('/'),
            'create' => CreateCustomer::route('/create'),
            'edit' => EditCustomer::route('/{record}/edit'),
        ];
    }
}
