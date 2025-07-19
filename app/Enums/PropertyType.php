<?php

namespace App\Enums;

enum PropertyType: string
{
    case RESIDENTIAL = 'residential';
    case COMMERCIAL = 'commercial';
    case INDUSTRIAL = 'industrial';
    case LAND = 'land';
    case OTHER = 'other';

    public function label(): string
    {
        return ucfirst($this->name);
    }
    public static function options(): array
    {
        return array_column(self::cases(), 'value');
    }
}
