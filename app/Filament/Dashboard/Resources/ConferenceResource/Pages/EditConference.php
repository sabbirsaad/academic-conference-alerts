<?php

namespace App\Filament\Dashboard\Resources\ConferenceResource\Pages;

use App\Filament\Dashboard\Resources\ConferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConference extends EditRecord
{
    protected static string $resource = ConferenceResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['published_at'] = null;

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
