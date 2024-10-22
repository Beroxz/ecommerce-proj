<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Unpaid = 'Unpaid';
    case Paid = 'Paid';
    case Cancelled = 'Cancelled';
    case Shipped = 'Shipped';
    case Completed = 'Completed';

    public static function getStatuses()
    {
        return [
            self::Paid, self::Unpaid, self::Cancelled, self::Shipped, self::Completed
        ];
    }
}
