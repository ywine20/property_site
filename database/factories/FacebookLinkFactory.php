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
            'picture'=>'https://source.unsplash.com/random/1200x500/?portrait',
            'description'=>$this->faker->text(),
        ];
    }
}
