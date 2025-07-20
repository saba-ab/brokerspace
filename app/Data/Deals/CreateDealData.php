<?php
namespace App\Data\Deals;

use App\Enums\DealType;
use App\Enums\DealStatus;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class CreateDealData extends Data
{
    public function __construct(
        public int $property_id,
        public int $user_id,
        public DealType $type,
        public DealStatus $status,
        public float $property_price,
        public ?float $commission_percentage,
        public ?float $commission_amount,
        public string $owner_name,
        public string $owner_phone,
        public ?string $owner_email,
    ) {}

    public static function rules(ValidationContext $context = null): array
    {
        return [
            'property_id' => ['required', 'exists:properties,id'],
            'user_id' => ['required', 'exists:users,id'],
            'type' => ['required', 'in:' . implode(',', DealType::options())],
            'status' => ['required', 'in:' . implode(',', DealStatus::options())],
            'property_price' => ['required', 'numeric', 'min:0'],
            'commission_percentage' => ['required_without:commission_amount', 'numeric', 'min:0', 'max:100'],
            'commission_amount' => ['required_without:commission_percentage', 'numeric', 'min:0'],
            'owner_name' => ['required', 'string', 'max:255'],
            'owner_phone' => ['required', 'string', 'max:255', 'regex:/^\+?[1-9]\d{1,14}$/'],
            'owner_email' => ['nullable', 'email', 'max:255', 'email:rfc,dns'],
        ];
    }
}
