<?php

namespace App\Data\Deals;

use Spatie\LaravelData\Attributes\Rules;
use Spatie\LaravelData\Data;

class DeleteDealData extends Data
{
    public function __construct(
        #[Rules(['required', 'exists:deals,id'])]
        public int $id
    ) {}

}
