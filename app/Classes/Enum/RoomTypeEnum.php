<?php

namespace App\Classes\Enum;

use App\Traits\EnumToLabel;

/**
 * 0:男性, 1:女性
 */
enum RoomTypeEnum: int
{
    use EnumToLabel;

    case SINGLE  = 3;
    case DOUBLE  = 1;
    case MASTER  = 2;

    public function label(): string
    {
        return match($this) {
            RoomTypeEnum::SINGLE  => 'Single',
            RoomTypeEnum::DOUBLE  => 'Double',
            RoomTypeEnum::MASTER  => 'Master',
        };
    }
}
