<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Content::factory(50)->create();
    }
}
