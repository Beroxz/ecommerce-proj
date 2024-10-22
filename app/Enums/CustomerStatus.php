<?php

namespace App\Enums;

enum CustomerStatus: string
{
    case Active = 'Active';
    case Disabled = 'Disabled';
}
