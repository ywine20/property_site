<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site_progress extends Model
{
   use HasFactory;
    protected $fillable=[
     'description',
     'project_id',
     'sidepost_galleries',
     'site_coveimg',s
    ];
     public function project()
    {
        return $this->hasMany(Project::class);
    }
}
