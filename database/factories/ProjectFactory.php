<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\City;
use App\Models\Town;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug(),
            'project_name' =>  'A'.rand(1000,3000),
            'description' => $this->faker->paragraph(),
            'cover' => $this->faker->text($maxNbChars = 10),
            'gallery' => $this->faker->text($maxNbChars = 10),
            'lower_price' => $this->faker->numberBetween($min = 100, $max = 4000),
            'upper_price' => $this->faker->numberBetween($min = 1000, $max = 5000),
//            'layer' => $this->faker->stateAbbr(),
//            'squre_feet' => $this->faker->randomDigitNot(5),
            'layer' => rand(1,12),
            'squre_feet' => rand(400,1000),
            // 'project_id_number' => $this->faker->randomDigitNot(5),
            'hou_no' => $this->faker->randomDigitNot(5),
            'street' => $this->faker->text($maxNbChars = 20),
            'ward' => $this->faker->text($maxNbChars = 20),
            'progress' => $this->faker->randomDigit(),
            'gmlink' => $this->faker->paragraph(),
            'category_id' => Category::all()->random()->category_id,
            'city_id' => City::all()->random()->id,
            'township_id' => Town::all()->random()->id,
            'viewer'=>rand(0,50),
//            'created_at'=>Carbon::today()->subDays(rand(0, 15))->addSeconds(rand(0, 86400)),
//            'updated_at'=>Carbon::today()->subDays(rand(0, 15))->addSeconds(rand(0, 86400)),



        ];
    }
}
