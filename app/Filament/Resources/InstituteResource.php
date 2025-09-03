<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstituteResource\Pages;
use App\Models\Institute;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class InstituteResource extends Resource
{
    protected static ?string $model = Institute::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function form(Form $form): Form
    {
        return $form->schema(static::getFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('logo')
                    ->circular(),

                TextColumn::make('slug')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('website')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->searchable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('details')
                    ->html()
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('user.email')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()->slideOver(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListInstitutes::route('/'),
            'create' => Pages\CreateInstitute::route('/create'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->columnSpanFull()
                ->placeholder('Foo Institute of Technology')
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

            TextInput::make('slug')
                ->placeholder('foo-institute-of-technology')
                ->required()
                ->unique(Institute::class, 'slug', fn ($record) => $record),

            TextInput::make('website')
                ->label('Official Website')
                ->placeholder('https://www.foo-institute.com')
                ->url()
                ->required(),

            TextInput::make('email')
                ->placeholder('hello@foo-institute.com')
                ->email()
                ->required(),

            TextInput::make('phone')
                ->placeholder('123-456-7890'),

            FileUpload::make('logo')
                ->image()
                ->directory('logos/institutes')
                ->columnSpanFull(),

            RichEditor::make('details')
                ->placeholder('Brief description of the institute...')
                ->columnSpanFull(),
        ];
    }
}
