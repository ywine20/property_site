<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\FacebookLink;
use App\Models\Slider;
use App\Models\Visitor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([
            'name' => 'SMT',
            'email' => 'smt@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09497777701',
            'role' => 'SuperAdmin',
            'image' => 'userPlaceholder.png',
        ]);
      
       \App\Models\Category::factory(5)->create();
       \App\Models\City::factory(5)->create();
       \App\Models\Town::factory(5)->create();
       \App\Models\Project::factory(10)->create();
       Amenity::factory(5)->create();
	  Visitor::factory(0)->create();
	  Slider::factory(7)->create();
       FacebookLink::factory(12)->create();
    }
}
