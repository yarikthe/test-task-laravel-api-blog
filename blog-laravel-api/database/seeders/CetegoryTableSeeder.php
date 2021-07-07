<?php

namespace Database\Seeders;

use App\Models\Cetegory;
use Illuminate\Database\Seeder;

class CetegoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cetegory::factory()->count(10)->create();
    }
}
