<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Rule;


class RegisterData extends Data
{
    public function __construct(
        #[Rule('required|string|max:255')]
        public string $name,
        #[Rule('required|email:rfc,dns|unique:users,email')]
        public string $email,
        #[Rule('required|min:8')]
        public string $password,
    ) {}
}
