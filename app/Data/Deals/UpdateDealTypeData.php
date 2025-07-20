<?php

namespace App\Data\Deals;

use App\Enums\DealType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class UpdateDealTypeData extends Data
{
    public function __construct(
        public int $id,
        public DealType $type,
    ) {}

    public static function rules(ValidationContext $context = null): array
    {
        return [
            'id' => ['required', 'exists:deals,id'],
            'type' => ['required', 'in:' . implode(',', DealType::options())],
        ];
    }
}
