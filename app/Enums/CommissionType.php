<?php

namespace App\Enums;

enum CommissionType: string
{
    case PERCENTAGE = 'percentage';
    case FIXED = 'fixed';

    public function label(): string
    {
        return ucfirst($this->name);
    }
    public static function options(): array
    {
        return array_column(self::cases(), 'value');
    }
}
