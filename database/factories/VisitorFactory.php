<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'session_id'=>$this->faker->title(),
            'created_at'=>Carbon::today()->subDays(rand(0, 15))->addSeconds(rand(0, 86400)),

        ];
    }
}
