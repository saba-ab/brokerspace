<?php

namespace App\Enums;

enum DealStatus: string
{
    case ACTIVE = 'active';
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function label(): string
    {
        return ucfirst($this->name);
    }
    public static function options(): array
    {
        return array_column(self::cases(), 'value');
    }
}
