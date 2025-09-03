<?php

namespace App\Filament\CommonComponents;

use App\Filament\CommonComponents\Contracts\SharableComponent;
use App\Filament\Resources\InstituteResource;
use App\Models\Category;
use App\Models\Conference;
use App\Models\Country;
use App\Models\Institute;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class ConferenceComponent implements SharableComponent
{
    public static function form(): array
    {
        return [
            TextInput::make('title')
                ->columnSpanFull()
                ->placeholder('Enter the title of the conference')
                ->required(),

            DatePicker::make('start_at')
                ->required()
                ->label('Start Date'),

            DatePicker::make('end_at')
                ->required()
                ->label('End Date'),

            TextInput::make('url')
                ->placeholder('https://example.com')
                ->required()
                ->url(),

            Select::make('type')
                ->required()
                ->searchable()
                ->options([
                    'conference' => 'Conference',
                    'symposium' => 'Symposium',
                    'professional conference' => 'Professional conference',
                    'trade-show' => 'Trade show',
                    'convention' => 'Convention',
                    'workshop' => 'Workshop',
                    'round-table' => 'Round table',
                    'seminar' => 'Seminar',
                    'online-conferences' => 'Online conferences',
                    'others' => 'Others',
                ]),

            Select::make('categories')
                ->label('Categories')
                ->relationship('categories')
                ->columnSpanFull()
                ->multiple()
                ->columns(6)
                ->options(Category::pluck('title', 'id')->toArray())
                ->required()
                ->searchable()
                ->preload(),

            Select::make('Organizer')
                ->label('Organizer')
                ->relationship('organizers')
                ->columnSpanFull()
                ->multiple()
                ->columns(6)
                ->options(Institute::pluck('name', 'id')->toArray())
                ->createOptionForm(InstituteResource::getFormSchema())
                ->required()
                ->searchable()
                ->preload(),

            Fieldset::make('Address')
                ->relationship('address')
                ->schema([
                    TextInput::make('address_line_1')->columns(6)->required()->placeholder('123 Main St'),
                    TextInput::make('address_line_2')->columns(6)->placeholder('Suite 100'),
                    TextInput::make('city')->columns(6)->required()->placeholder('Kuala Lumpur'),
                    TextInput::make('state')->columns(6)->required()->placeholder('Federal Territory'),
                    TextInput::make('postal_code')->columns(6)->required()->placeholder('50000'),
                    Select::make('country_id')->label('Country')->columns(6)->options(Country::pluck('name', 'id')->toArray())->required()->searchable()->preload(),
                ]),

            RichEditor::make('details')
                ->columnSpanFull()
                ->placeholder('Enter the details of the conference')
                ->required(),
        ];
    }

    public static function table(): array
    {
        return [
            TextColumn::make('uuid')
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('title')
                ->searchable()
                ->sortable()
                ->description(fn (Conference $conference): string => $conference->address->country->name.' ⍟ '.$conference->type),

            TextColumn::make('details')
                ->html()
                ->limit(50)
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('start_at')
                ->label('Start Date')
                ->date()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('end_at')
                ->label('End Date')
                ->date()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('categories.title')
                ->badge()
                ->color(Color::Slate)
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('url')
                ->toggleable(isToggledHiddenByDefault: true),

            IconColumn::make('published_at')
                ->label('Published')
                ->getStateUsing(function ($record) {
                    return ! is_null($record->published_at);
                })
                ->trueIcon('heroicon-o-check-circle')
                ->trueColor('success')
                ->falseIcon('heroicon-o-x-circle')
                ->falseColor('danger'),

            TextColumn::make('featured_at')
                ->label('Featured Date')
                ->date()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('views')
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('creator.email')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('approver.email')
                ->label('Who Approved')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
