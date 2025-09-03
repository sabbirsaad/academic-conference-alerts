<?php

namespace App\Filament\Resources;

use App\Filament\CommonComponents\ConferenceComponent;
use App\Filament\Resources\ConferenceResource\Pages;
use App\Jobs\NotifyOrganizerForConferenceApproval;
use App\Models\Conference;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ConferenceResource extends Resource
{
    protected static ?string $model = Conference::class;

    protected static ?string $slug = 'conferences';

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...ConferenceComponent::form(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ...ConferenceComponent::table(),
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make(),
                    Action::make('publish')
                        ->label(fn (Model $record): string => $record->published_at ? 'Unpublish' : 'Publish')
                        ->action(function (Model $record) {
                            if ($record->published_at) {
                                $record->published_at = null;
                            } else {
                                $record->published_at = now();

                                NotifyOrganizerForConferenceApproval::dispatch($record);
                            }
                            $record->save();
                        })
                        ->icon(fn (Model $record): string => $record->published_at ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn (Model $record): string => $record->published_at ? 'danger' : 'success')
                        ->requiresConfirmation(),
                ])
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->color(Color::Blue),
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
            'index' => Pages\ListConferences::route('/'),
            'create' => Pages\CreateConference::route('/create'),
            'edit' => Pages\EditConference::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['approver', 'creator']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug'];
    }
}
