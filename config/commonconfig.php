<?php

use App\Enums\StringStatusEnum;
use App\Enums\TicketStatusEnum;
use App\Enums\BooleanStatusEnum;

return [

    'fixed_roles' => ['admin', 'user'],

    'path_profile_image' => 'images/users/',
    'path_image' => 'images/',
    'language_icon' => 'images/languages/',
    'ticket_attachment' => 'images/tickets/',
    'hero_icons' => 'icons/heroicons/',
    'email_status' => [
        BooleanStatusEnum::ACTIVE->value => ['color_class' => 'success'],
        BooleanStatusEnum::INACTIVE->value => ['color_class' => 'danger'],
    ],
    'active_status' => [
        BooleanStatusEnum::ACTIVE->value => ['color_class' => 'success'],
        BooleanStatusEnum::INACTIVE->value => ['color_class' => 'danger'],
    ],
    'account_status' => [
        StringStatusEnum::ACTIVE->value => ['color_class' => 'success'],
        StringStatusEnum::INACTIVE->value => ['color_class' => 'warning'],
        StringStatusEnum::DELETED->value => ['color_class' => 'danger'],
    ],
    'ticket_status' => [
        TicketStatusEnum::OPEN->value => ['color_class' => 'info'],
        TicketStatusEnum::PROGRESS->value => ['color_class' => 'warning'],
        TicketStatusEnum::RESOLVED->value => ['color_class' => 'success'],
        TicketStatusEnum::CLOSED->value => ['color_class' => 'danger'],
    ],

    'image_extensions' => ['png', 'jpg', 'jpeg', 'svg'],

    'strip_tags' => [
        'escape_text' => ['beginning_text', 'ending_text', 'body', 'currentLangData'],
    ],
];
