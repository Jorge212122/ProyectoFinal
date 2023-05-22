<?php

namespace Database\Factories;

use App\Models\Season;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeasonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Season::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content_id = 0;
        $flag = true;
        while($flag){
            $random = $this->faker->numberBetween(1,50);
            $content = DB::table('contents')->where('id', $random)->get();            
            if($content[0]->is_serie == true){
                $flag = false;
                $content_id = $random;
            }
        }

        $array = [
            'images/test_titanic.jpg',
            'images/test_shrek.jpg',
            'images/test_avatar.png',
            'images/test_her.jpg',
            'images/test_magoz.jpg'
        ];

        $image_path = $array[$this->faker->numberBetween(0,4)];

        return [
            'content_id' => $content_id,
            'season' => $this->faker->numberBetween(1,15),
            'description' => $this->faker->sentence(),
            'year' => $this->faker->regexify('[0-9]{4}'),
            'chapters' => 0,
            'image_path' => $image_path,
            'created_at' => $this->faker->date() . $this->faker->time(),
        ];
    }
}