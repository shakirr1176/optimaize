<?php

namespace App\Enums;

enum AnnouncementStatusEnum: int
{
    case DRAFT = 0;
    case PUBLISHED = 1;

    public function getLabel(): string
    {
        switch ($this) {
            case self::DRAFT:
                return __('Draft');
            case self::PUBLISHED:
                return __('Published');
            default:
                return __('Unknown');
        }
    }

    public static function getLabels(): array
    {
        return [
            self::DRAFT->value => self::DRAFT->getLabel(),
            self::PUBLISHED->value => self::PUBLISHED->getLabel(),
        ];
    }

    public static function getStatusKeys(): array
    {
        return array_column(self::cases(), 'value');
    }

}
