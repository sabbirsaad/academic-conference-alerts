<?php

namespace App\Filament\Resources\ConferenceVisitorResource\Pages;

use App\Filament\Resources\ConferenceVisitorResource;
use Filament\Resources\Pages\ListRecords;

class ListConferenceVisitors extends ListRecords
{
    protected static string $resource = ConferenceVisitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
