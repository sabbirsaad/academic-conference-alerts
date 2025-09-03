<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConferenceVisitorResource\Pages;
use App\Models\ConferenceVisitor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ConferenceVisitorResource extends Resource
{
    protected static ?string $model = ConferenceVisitor::class;

    protected static ?string $label = 'Visitor';

    protected static ?string $navigationIcon = 'heroicon-o-eye';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('conference_id')
                    ->relationship('Conference', 'title')
                    ->required()
                    ->preload()
                    ->searchable(),

                TextInput::make('requester')
                    ->required()
                    ->default('visitor'),

                TextInput::make('ip')
                    ->ip()
                    ->placeholder('110.204.102.88'),

                TextInput::make('location')
                    ->placeholder('Bangladesh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('conference.title')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                TextColumn::make('requester')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ip')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('location')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListConferenceVisitors::route('/'),
        ];
    }
}
