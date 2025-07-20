<?php

namespace App\Data\Deals;

use App\Enums\DealStatus;
use Spatie\LaravelData\Attributes\Rules;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class UpdateDealStatusData extends Data
{
    public function __construct(
        public int $id,
        public DealStatus $status,
    ) {}

    public static function rules(ValidationContext $context = null): array
    {
        return [
            'id' => ['required', 'exists:deals,id'],
            'status' => ['required', 'in:' . implode(',', DealStatus::options())],
        ];
    }
}
