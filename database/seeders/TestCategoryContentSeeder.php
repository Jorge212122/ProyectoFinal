<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Controllers\ContentController;
use Database\Factories\CategoryContentFactory;

class TestCategoryContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        for ($i = 1; $i <= 50; $i++) {
            $categorycontent = new CategoryContentFactory();
            $catcont = $categorycontent->definition();
            ContentController::addCategorySeeder($catcont["content_id"], $catcont["category_id"]);
        }
    }
}
