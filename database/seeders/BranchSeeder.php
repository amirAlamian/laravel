<?php

namespace Database\Seeders;

use App\Models\branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        branch::factory()->times(20)->create();

    }
}
