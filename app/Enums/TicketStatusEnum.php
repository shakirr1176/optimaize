<?php

namespace App\Enums;

enum TicketStatusEnum: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';
    case RESOLVED = 'resolved';
    case PROGRESS = 'progress';

    public function getLabel(): string
    {
        switch ($this) {
            case self::OPEN:
                return __('Open');
            case self::CLOSED:
                return __('Closed');
            case self::RESOLVED:
                return __('Resolved');
            case self::PROGRESS:
                return __('Progress');
            default:
                return __('Unknown Role');
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
