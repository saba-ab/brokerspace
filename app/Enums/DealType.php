<?php

namespace App\Enums;

enum DealType: string
{
    case SALE = 'sale';
    case RENT = 'rent';
    case RENT_TO_OWN = 'rent_to_own';
    case DAILY_RENT = 'daily_rent';
    case PLEDGE = 'pledge';

    public function label(): string
    {
        return ucfirst($this->name);
    }
    public static function options(): array
    {
        return array_column(self::cases(), 'value');
    }
}
