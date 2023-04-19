<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class siteProgress extends Model
{
    use HasFactory;
      protected $fillable=[
        'title',
        'decription',


    // protected $fillable = ['title', 'description', 'images'];

    // protected $casts = [
    //     'images' => 'array',
    ];



    // public function setFilenamesAttribute($value)
    // {
    //     $this->attributes['filenames'] = json_encode($value);
    // }

    public function project(){
        return $this->belongsTo(Project::class);
    }
       public function images(){
        return $this->hasMany(Image::class);
    }

}
