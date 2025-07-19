<?php

namespace Database\Seeders;

use App\Models\Deal;
use Illuminate\Database\Seeder;

class DealSeeder extends Seeder
{
    public function run(): void
    {
        $this->createDeal();
    }
    public function createDeal(): void
    {
        Deal::factory()->count(10)->create();
    }
}
