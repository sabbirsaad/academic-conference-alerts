<?php

namespace App\Filament\Dashboard\Resources\ConferenceResource\Pages;

use App\Filament\Dashboard\Resources\ConferenceResource;
use App\Jobs\NotifyAdminForNewConference;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateConference extends CreateRecord
{
    protected static string $resource = ConferenceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['uuid'] = Str::uuid();
        $data['creator_id'] = Auth::id();

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $conference = parent::handleRecordCreation($data);

        NotifyAdminForNewConference::dispatch($conference);

        return $conference;
    }
}
