<?php

namespace App\Filament\Dashboard\Resources\ConferenceResource\Pages;

use App\Filament\Dashboard\Resources\ConferenceResource;
use App\Models\Conference;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListConferences extends ListRecords
{
    protected static string $resource = ConferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'Published' => Tab::make('Published')
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(function ($query) {
                    $query->published();
                }),
            'Unpublished' => Tab::make('UnPublished')
                ->icon('heroicon-o-x-circle')
                ->badgeColor('danger')
                ->badge(Conference::mine()->unPublished()->count())
                ->modifyQueryUsing(function ($query) {
                    $query->unPublished();
                }),
            'Expired' => Tab::make('Expired')
                ->modifyQueryUsing(function ($query) {
                    $query->expired();
                }),
        ];
    }
}
