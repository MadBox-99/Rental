<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Models\Car;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationGroup = 'Autók';

    protected static ?string $navigationLabel = 'Autók';

    protected static ?string $modelLabel = 'Autó';

    protected static ?string $pluralModelLabel = 'Autók';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('brand')
                    ->label('Márka')
                    ->live()
                    ->required()
                    ->afterStateUpdated(fn (Set $set, Get $get) => $set('slug', Str::slug($get('brand').'-'.Str::slug($get('model')))))
                    ->maxLength(255),
                TextInput::make('model')
                    ->label('Model')
                    ->live()
                    ->required()
                    ->afterStateUpdated(fn (Set $set, Get $get) => $set('slug', Str::slug($get('brand').'-'.Str::slug($get('model')))))
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Slug')
                    ->unique('cars', 'slug', ignoreRecord: true)
                    ->visible(fn (Get $get) => $get('brand') !== null && $get('model') !== null)
                    ->afterStateUpdated(fn (Set $set, Get $get) => $set('slug', Str::slug($get('brand').'-'.Str::slug($get('model')))))
                    ->required()
                    ->maxLength(255),
                TextInput::make('transmission')
                    ->label('Sebességváltó')
                    ->maxLength(255),
                TextInput::make('horsepower')
                    ->label('Lóerő')
                    ->numeric(),
                TextInput::make('mileage')
                    ->label('Kilométeróra állása')
                    ->numeric(),
                TextInput::make('year')
                    ->label('Gyártási év')
                    ->numeric(),
                TextInput::make('fuel')
                    ->label('Üzemanyag')
                    ->maxLength(255),
                TextInput::make('color')
                    ->label('Szín')
                    ->maxLength(255),
                TextInput::make('doors')
                    ->label('Ajtók száma')
                    ->numeric(),
                TextInput::make('license_plate')
                    ->label('Rendszám')
                    ->unique('cars', 'license_plate', ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                DatePicker::make('technical_validity')
                    ->label('Műszaki érvényesség')
                    ->placeholder('YYYY-MM-DD')
                    ->format('Y-m-d'),
                TextInput::make('chassis_number')
                    ->label('Alvázszám')
                    ->unique('cars', 'chassis_number', ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                TextInput::make('engine_number')
                    ->label('Motorszám')
                    ->unique('cars', 'engine_number', ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                TextInput::make('owner')
                    ->label('Tulajdonos')
                    ->maxLength(255),
                FileUpload::make('images')
                    ->label('Autó képek')
                    ->visible(fn (Get $get) => $get('slug') !== null)
                    ->multiple()
                    ->reorderable()
                    ->preserveFilenames()
                    ->directory(fn (Get $get) => 'cars/'.$get('slug'))
                    ->maxFiles(10)
                    ->image()
                    ->openable()
                    ->columnSpanFull(),

                RichEditor::make('short_description')
                    ->label('Rövid leírás')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->fileAttachmentsVisibility('public')
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->label('Leírás')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->fileAttachmentsVisibility('public')
                    ->columnSpanFull(),
                Select::make('attributes')
                    ->label('Tulajdonságok')
                    ->relationship('attributes', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('brand')
                    ->label('Márka')
                    ->searchable(),
                TextColumn::make('model')
                    ->label('Model')
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                TextColumn::make('transmission')
                    ->label('Sebességváltó')
                    ->searchable(),
                TextColumn::make('horsepower')
                    ->label('Lóerő')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('mileage')
                    ->label('Kilométeróra állása')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('year')
                    ->label('Gyártási év')
                    ->sortable(),
                TextColumn::make('fuel')
                    ->label('Üzemanyag')
                    ->searchable(),
                TextColumn::make('color')
                    ->label('Szín')
                    ->searchable(),
                TextColumn::make('doors')
                    ->label('Ajtók száma')
                    ->numeric()
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
