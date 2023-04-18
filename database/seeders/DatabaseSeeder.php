<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\FacebookLink;
use App\Models\Slider;
use App\Models\Visitor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Admin;

use App\Models\Previewimage;
use App\Models\Product;
use App\Models\Project;


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
            'image' => null,
        ]);

        Admin::create([
            'name' => 'Admin3',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09497777701',
            'role' => 'SuperAdmin',
            'image' => null,
        ]);

        \App\Models\Category::factory(5)->create();
        \App\Models\City::factory(5)->create();
        \App\Models\Town::factory(5)->create();
        \App\Models\Project::factory(50)->create();
        Amenity::factory(5)->create();

        Visitor::factory(10)->create();
        Slider::factory(7)->create();

        FacebookLink::factory(12)->create();

        // Get all the project ids in ascending order
        $projectIds = Project::orderBy('id', 'asc')->pluck('id')->toArray();
        // Seed the previewimages table with project_id in series
        Previewimage::factory()->count(50)->create([

            'project_id' => function () use (&$projectIds) {
                // Take the first id in the array and remove it
                return array_shift($projectIds);
            },
        ]);
    }
}
