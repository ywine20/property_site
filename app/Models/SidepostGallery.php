<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidepostGallery extends Model
{

      use HasFactory;
    protected $fillable=[
      'site_post_images',
    ];
     public function project()
    {
        return $this->hasMany(Project::class);
    }
}
