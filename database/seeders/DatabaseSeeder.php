<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Town;
use App\Models\User;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\Amenity;
use App\Models\Product;
use App\Models\Project;
use App\Models\Visitor;
use App\Models\Category;
use App\Models\FacebookLink;
use App\Models\Previewimage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


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
            'email' => 'admin@sunmyattun.com',
            'password' => Hash::make('password'),
            'phone' => '09497777701',
            'role' => 'SuperAdmin',
            'image' => null,
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '0987654321',
            'profile_img' => null,
            'tier' => 'bronze'
        ]);

        // User::create([
        //     'name' => 'WinWinMaw',
        //     'email' => 'mawinwinmaw4@gmail.com',
        //     'password' => Hash::make('password'),
        //     'phone' => '0987654321',
        //     'profile_img' => null,
        //     'tier' => 'bronze'
        // ]);


        \App\Models\Category::factory(5)->create();
        // \App\Models\City::factory(5)->create();
        // \App\Models\Town::factory(5)->create();
        // \App\Models\Project::factory(50)->create();
        // Amenity::factory(5)->create();
        // Visitor::factory(10)->create();
        Slider::factory(7)->create();
        // FacebookLink::factory(12)->create();

        // Get all the project ids in ascending order
        // $projectIds = Project::orderBy('id', 'asc')->pluck('id')->toArray();
        // Seed the previewimages table with project_id in series
        // Previewimage::factory()->count(50)->create([

        //     'project_id' => function () use (&$projectIds) {
        //         // Take the first id in the array and remove it
        //         return array_shift($projectIds);
        //     },
        // ]);
    }
}
