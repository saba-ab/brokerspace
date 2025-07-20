<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Carbon\Carbon;
class UserData extends Data
{
    public function __construct(
        public int $id,
        public string $first_name,
        public string $last_name,
        public string $phone,
        public string $email,
        public Carbon $created_at,
        public Carbon $updated_at,
    ) {}
}
