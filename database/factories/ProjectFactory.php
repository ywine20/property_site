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
            'three_sixty_image' => $this->faker->text($maxNbChars = 10),
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
            'gmlink' =>'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15281.235374842701!2d96.16330505!3d16.761303200000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1680500643968!5m2!1sen!2smm',
            'category_id' => Category::all()->random()->category_id,
            'city_id' => City::all()->random()->id,
            'township_id' => Town::all()->random()->id,
            'viewer'=>rand(0,50),
            // 'site_progress_id' =>rand(1,10),
            // 'legal_document_id' =>rand(1,10)
//            'created_at'=>Carbon::today()->subDays(rand(0, 15))->addSeconds(rand(0, 86400)),
//            'updated_at'=>Carbon::today()->subDays(rand(0, 15))->addSeconds(rand(0, 86400)),



        ];
    }
}
