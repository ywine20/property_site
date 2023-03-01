<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Address;
// use App\Models\City;
use App\Models\Project;

class Town extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
        // 'project_id',
    ];

    // public function address()
    // {
    //     return $this->hasMany(Address::class);
    // }

    // public function city()
    // {
    //     return $this->hasMany(City::class);
    // }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

}
