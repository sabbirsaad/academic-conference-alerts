<?php

namespace App\Filament\Resources\ConferenceResource\Pages;

use App\Filament\Resources\ConferenceResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateConference extends CreateRecord
{
    protected static string $resource = ConferenceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['uuid'] = Str::uuid();
        $data['creator_id'] = Auth::id();

        if (in_array(Auth::user()->email, explode(',', env('ADMIN_USERS')))) {
            $data['published_at'] = now();
            $data['approver_id'] = Auth::id();
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
