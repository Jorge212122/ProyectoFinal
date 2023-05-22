<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $json = File::get("database/data/contents.json");
        $data = json_decode($json);
        foreach($data as $content){
            Content::create(array(
                'id' => $content->id,
                'name' => $content->name,
                'description' => $content->description,
                'duration' => $content->duration,
                'year' => $content->year,
                'image_path' => $content->image_path,
            ));
        }
    }
}
