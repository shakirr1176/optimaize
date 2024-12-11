<?php

namespace App\Enums;

enum StringStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case DELETED = 'deleted';

    public function getLabel(): string
    {
        switch ($this) {
            case self::ACTIVE:
                return __('Active');
            case self::INACTIVE:
                return __('Inactive');
            case self::DELETED:
                return __('Delete');
            default:
                return __('Unknown');
        }
    }

    public static function getLabels(): array
    {
        $response = [];
        foreach (self::cases() as $case) {
            $response[$case->value] = $case->getLabel();
        }

        return $response;
    }

    public static function getStatusKeys(): array
    {
        return array_column(self::cases(), 'value');
    }

}
