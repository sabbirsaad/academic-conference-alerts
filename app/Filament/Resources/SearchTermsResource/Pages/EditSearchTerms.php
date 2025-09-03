<?php

namespace App\Filament\Resources\SearchTermsResource\Pages;

use App\Filament\Resources\SearchTermsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSearchTerms extends EditRecord
{
    protected static string $resource = SearchTermsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
