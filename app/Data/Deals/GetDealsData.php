<?php

namespace App\Data\Deals;

use Spatie\LaravelData\Data;

class GetDealsData extends Data
{
    public function __construct(
        public int $page = 1,
        public int $perPage = 10,
        public string $sortBy = 'created_at',
        public string $sortOrder = 'desc',
        public string $search = '',
        public string $status = '',
        public string $type = '',
    ) {}
}
