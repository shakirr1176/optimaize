<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function generate($parameters): bool|User
    {
        $userParams = Arr::only($parameters, [
            'first_name',
            'last_name',
            'email',
            'is_active',
        ]);

        if (Arr::has($parameters, 'assigned_role')) {
            $userParams['assigned_role'] = $parameters['assigned_role'];
        }

        $user = User::create($userParams);

        if (empty($user)) {
            return false;
        }

        return $user;
    }
}
