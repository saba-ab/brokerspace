<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $this->createProperty();
    }
    public function createProperty(): void
    {
        Property::factory()->count(10)->create();
    }
}
