<?php

namespace App\Enums;

enum RoleEnum: string
{
    case USER = 'user';
    case SYSTEM_ADMIN = 'system-admin';

    public function getLabel(): string
    {
        switch ($this) {
            case self::USER:
                return __('User');
            case self::SYSTEM_ADMIN:
                return __('System Admin');
            default:
                return __('Unknown Role');
        }
    }
}
