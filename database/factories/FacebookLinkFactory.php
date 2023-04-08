<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FacebookLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_post_link'=>'https://www.facebook.com/Sunmyattun',
            'picture'=>'fb-img-example.jpg',
            'description'=>$this->faker->text(),
        ];
    }
}
