<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Amenity extends Model
{
    use HasFactory;
    protected $fillable=[   
     'amenity',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_amenity');
    }
}
