<?php

namespace App\Filament\Resources\ConferenceVisitorResource\Pages;

use App\Filament\Resources\ConferenceVisitorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConferenceVisitor extends EditRecord
{
    protected static string $resource = ConferenceVisitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
