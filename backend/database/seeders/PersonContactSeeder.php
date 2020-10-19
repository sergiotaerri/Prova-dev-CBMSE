<?php

namespace Database\Seeders;

use App\Models\PersonContact;
use Illuminate\Database\Seeder;

class PersonContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonContact::factory()->count(10)->create();
    }
}
