<?php

namespace App\Filament\Resources\SearchTermsResource\Pages;

use App\Filament\Resources\SearchTermsResource;
use Filament\Resources\Pages\ListRecords;

class ListSearchTerms extends ListRecords
{
    protected static string $resource = SearchTermsResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
