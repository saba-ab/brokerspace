<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Rule;


class RegisterData extends Data
{
    public function __construct(
        #[Rule('required|email:rfc,dns|unique:users,email')]
        public string $email,
        #[Rule('required|confirmed|min:8')]
        public string $password,
        #[Rule('required|string|max:255')]
        public string $first_name,
        #[Rule('required|string|max:255')]
        public string $last_name,
        #[Rule('required|string|max:255')]
        public string $phone,
    ) {}

}
