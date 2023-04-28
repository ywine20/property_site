<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'album',
    ];

   public function projects()
    {
        return $this->belongsToMany(Project::class, 'legaldocuments');
    }

     public function albumTestImages()
    {
        return $this->hasMany(AlbumTestImage::class, 'album_tests_id');
    }
}
