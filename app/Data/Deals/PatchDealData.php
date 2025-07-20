<?php

namespace App\Data\Deals;

use App\Enums\DealStatus;
use App\Enums\DealType;
use Spatie\LaravelData\Attributes\Rules;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class PatchDealData extends Data
{
    public function __construct(
        #[Rules(['required', 'exists:deals,id'])]
        public int $id,
        public ?int $property_id,
        public ?int $user_id,
        public ?DealType $type,
        public ?DealStatus $status,
        public ?float $property_price,
        public ?float $commission_percentage,
        public ?float $commission_amount,
        public ?string $owner_name,
        public ?string $owner_phone,
        public ?string $owner_email,
    ) {}

    public static function rules(ValidationContext $context = null): array
    {
        return [
            'id' => ['required', 'exists:deals,id'],
            'property_id' => ['nullable', 'exists:properties,id'],
            'user_id' => ['nullable', 'exists:users,id'],
            'type' => ['nullable', 'in:' . implode(',', DealType::options())],
            'status' => ['nullable', 'in:' . implode(',', DealStatus::options())],
            'property_price' => ['nullable', 'numeric', 'min:0'],
            'commission_percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'commission_amount' => ['nullable', 'numeric', 'min:0'],
            'owner_name' => ['nullable', 'string', 'max:255'],
            'owner_phone' => ['nullable', 'string', 'max:255', 'regex:/^\+?[1-9]\d{1,14}$/'],
            'owner_email' => ['nullable', 'email', 'max:255', 'email:rfc,dns'],
        ];
    }
}
