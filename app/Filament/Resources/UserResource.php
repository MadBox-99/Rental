<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'Felhasználó';

    protected static ?string $pluralModelLabel = 'Felhasználók';

    protected static ?string $navigationGroup = 'Felhasználók';

    protected static ?string $navigationLabel = 'Felhasználók';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        /**
         *  'name',
         * 'email',

         *'password',
         * 'company_name',
         *'company_address',
         * 'company_tax_number',
         * 'company_registration_number',
         * 'representative',
         * 'contact_person',
         * 'phone', */
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Név')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->unique('users', 'email', ignoreRecord: true)
                    ->required(),
                TextInput::make('phone')
                    ->label('Telefonszám')
                    ->tel()
                    ->required(),
                TextInput::make('company_name')
                    ->label('Cég neve'),
                TextInput::make('company_address')
                    ->label('Cím'),
                TextInput::make('company_tax_number')
                    ->label('Adószám'),
                TextInput::make('company_registration_number')
                    ->label('Cégjegyzékszám'),
                TextInput::make('representative')
                    ->label('Képviselő'),
                TextInput::make('contact_person')
                    ->label('Kapcsolattartó'),
                Select::make('roles')
                    ->label('Szerepkörök')
                    ->multiple()
                    ->preload()
                    ->relationship('roles', 'name'),
                DateTimePicker::make('email_verified_at')
                    ->label('Email megerősítve'),
                TextInput::make('password')
                    ->label('Jelszó')
                    ->password()
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state)),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Név')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Telefonszám')
                    ->searchable(),
                TextColumn::make('company_name')
                    ->label('Cég neve')
                    ->searchable(),
                TextColumn::make('company_address')
                    ->label('Cím')
                    ->searchable(),
                TextColumn::make('company_tax_number')
                    ->label('Adószám')
                    ->searchable(),
                TextColumn::make('company_registration_number')
                    ->label('Cégjegyzékszám')
                    ->searchable(),
                TextColumn::make('representative')
                    ->label('Képviselő')
                    ->searchable(),
                TextColumn::make('contact_person')
                    ->label('Kapcsolattartó')
                    ->searchable(),
                TextColumn::make('roles.name')
                    ->label('Szerepkörök')
                    ->searchable()
                    ->getStateUsing(function (User $record) {
                        return $record->roles->pluck('name')->implode(', ');
                    }),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
