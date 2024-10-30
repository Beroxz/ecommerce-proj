<?php

namespace App\Enums;

enum UsersRole: string
{
    case Admin = 1;
    case Seller = 2;
    case User = 3;

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::Seller => 'Seller',
            self::User => 'User',
        };
    }
}
