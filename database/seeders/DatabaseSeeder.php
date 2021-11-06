<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $rs = \App\Models\Restaurant::factory()->count(15)->create();
        $rs->each(function($restaurant) {
           \App\Models\Food::factory()->count(rand(5, 8))->for($restaurant)->create();
        });
    }
}
