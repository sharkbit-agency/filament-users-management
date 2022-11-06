<?php

namespace sharkBitAgency\FilamentUsersManagement\Resources\UserResource\Pages;

use sharkBitAgency\FilamentUsersManagement\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getTitle(): string
    {
        return trans('filament-users-management::user.resource.title.list');
    }
}
