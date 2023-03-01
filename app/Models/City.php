<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Address;
// use App\Models\Town;
use App\Models\Project;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
    ];

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    // public function towns()
    // {
    //     return $this->belongsTo(Town::class);
    // }
}
