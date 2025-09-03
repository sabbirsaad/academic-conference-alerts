<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'Verified' => Tab::make('Verified')
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(function ($query) {
                    $query->verified();
                }),
            'Unverified' => Tab::make('Unverified')
                ->icon('heroicon-o-x-circle')
                ->modifyQueryUsing(function ($query) {
                    $query->unVerified();
                }),
        ];
    }
}
