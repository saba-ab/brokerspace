<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Rule;

class LoginData extends Data
{
    public function __construct(
        #[Rule('required|email')]
        public string $email,
        #[Rule('required|min:8')]
        public string $password,
    ) {}
}
