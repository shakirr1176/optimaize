<?php

namespace App\Enums;

enum BooleanStatusEnum: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public function getLabel(): string
    {
        switch ($this) {
            case self::ACTIVE:
                return __('Active');
            case self::INACTIVE:
                return __('Inactive');
            default:
                return __('Unknown');
        }
    }

    public static function getLabels(): array
    {
        return [
            self::ACTIVE->value => self::ACTIVE->getLabel(),
            self::INACTIVE->value => self::INACTIVE->getLabel(),
        ];
    }

    public static function getStatusKeys(): array
    {
        return array_column(self::cases(), 'value');
    }

}
