<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteGallery extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'description',
      'gallery',
    ];
public function projects(){
        return $this->belongsToMany(Project::class ,'siteprogresses' );
    }
}
