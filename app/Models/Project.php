<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Category;
use App\Models\Amenity;
// use App\Models\Gallery;
use App\Models\FacebookLink;
use App\Models\Town;
use App\Models\City;
use App\Modles\Album;
use App\Models\AlbumDocument;

class Project extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;

    protected $fillable=[
        'slug',
        'project_name',
        'description',
        'cover',
        'gallery',
        'lower_price',
        'upper_price',
        'category_id',
        'township_id',
        'city_id',
        'layer',
        // 'amenity',
        'squre_feet',
        // 'project_id_number',
        'gmlink',
        'progress',
        // 'longitude',
        // 'latitude',
        'hou_no',
        'street',
        'ward',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function amenity()
    {
        return $this->belongsToMany(Amenity::class, 'project_amenity');
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function facebooklink()
    {
        return $this->hasOne(FacebookLink::class);
    }

//update preview images
    public function previewimages()
    {
        return $this->hasMany(Previewimage::class);
    }

    // public function gallery()
    // {
    //     return $this->hasMany(Gallery::class);
    // }

    public function towns()
    {
        return $this->belongsTo(Town::class);
    }

    public function cities()
    {
        return $this->belongsTo(City::class);
    }
// add document/albums file 16/3/23 ..
  public function album()
    {
        return $this->belongsToMany(Amenity::class, 'album_documents');
    }
}
