<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Models\Address;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $slug = 'addresses';

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('address_line_1')
                    ->required(),

                TextInput::make('address_line_2'),

                TextInput::make('city')
                    ->required(),

                TextInput::make('state')
                    ->required(),

                TextInput::make('postal_code')
                    ->required(),

                Select::make('country_id')
                    ->relationship('country', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('address_line_1'),

                TextColumn::make('conference.title')
                    ->url(fn ($record) => $record->conference->link())
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('address_line_2')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('city')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('state')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('postal_code')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('country.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['country']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['country.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->country) {
            $details['Country'] = $record->country->name;
        }

        return $details;
    }
}
