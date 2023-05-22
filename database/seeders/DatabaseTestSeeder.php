<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            TestCategoriesSeeder::class,
            TestContentsSeeder::class,
            TestCategoryContentSeeder::class
        ]);
    }
}
