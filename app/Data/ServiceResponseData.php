<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ServiceResponseData extends Data
{
    public function __construct(
        public bool $success,
        public string $message,
        public mixed $data = null,
        public int $status = 200,
    ) {}

    public static function success(string $message, mixed $data = null, int $status = 200): self
    {
        return new self(true, $message, $data, $status);
    }

    public static function error(string $message, int $status = 500, mixed $data = null): self
    {
        return new self(false, $message, $data, $status);
    }
}
