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
        $user = User::where('email', $data['email'])->first();
        if ($user)
            if (empty($data['password']))
                $data['password'] = $user->password;

        return $data;
    }

    protected function getTitle(): string
    {
        return trans('filament-users-management::user.resource.title.edit');
    }
}
