<?php

namespace sharkBitAgency\FilamentUsersManagement\Resources\UserResource\Pages;

use App\Models\User;
use sharkBitAgency\FilamentUsersManagement\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password']))
            unset($data['password']);

        return $data;
    }

    protected function getTitle(): string
    {
        return trans('filament-users-management::user.resource.title.edit');
    }
}
