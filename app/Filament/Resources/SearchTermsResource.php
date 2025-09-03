<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SearchTermsResource\Pages;
use App\Models\SearchTerms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SearchTermsResource extends Resource
{
    protected static ?string $model = SearchTerms::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('terms')
                    ->required()
                    ->placeholder('Social Science'),

                TextInput::make('search_result')
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('requester')
                    ->required()
                    ->default('visitor'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('terms')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('search_result')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('requester')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListSearchTerms::route('/'),
        ];
    }
}
