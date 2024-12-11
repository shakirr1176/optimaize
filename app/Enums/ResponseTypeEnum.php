<?php

namespace App\Enums;

enum ResponseTypeEnum: string
{
    case STATUS_KEY = 'status';
    case MESSAGE_KEY = 'message';
    case SUCCESS = 'success';
    case WARNING = 'warning';
    case ERROR = 'error';
}
