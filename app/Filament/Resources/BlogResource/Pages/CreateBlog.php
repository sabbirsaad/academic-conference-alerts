<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = Auth::id();
        $data['published_at'] = now();

        return $data;
    }
}
