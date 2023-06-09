<?php

namespace App\Models;

use App\Models\Album as ModelsAlbum;
use App\Models\City;
use App\Models\Town;
use App\Models\Image;
use App\Modles\Album;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\SiteGallery;
use App\Models\FacebookLink;
use App\Models\siteProgress;
use App\Models\AlbumDocument;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;
    protected static function boot()
    {
        parent::boot();

        // Use the deleting event hook to remove related records from project_amenity table
        static::deleting(function ($project) {
            $project->amenity()->detach();
        });
    }

    protected $fillable = [
        'slug',
        'project_name',

        'description',
        'cover',
        'three_sixty_image',
        'priceImg',
        'lower_price',
        'upper_price',
        'category_id',
        'township_id',
        'city_id',
        'layer',
        // 'amenity',
        'square_feet',
        // 'project_id_number',
        'gmlink',
        'progress',
        // 'longitude',
        // 'latitude',
        'hou_no',
        'street',
        'ward',
    ];

    public function assets()
    {
        return $this->hasMany(Assets::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function town()
    {
        return $this->belongsTo(Town::class, 'township_id');
    }

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

    public function previewimages()
    {
        return $this->hasOne(Previewimage::class);
    }

    public function cities()
    {
        return $this->belongsTo(City::class);
    }

    public function towns()
    {
        return $this->belongsTo(Town::class, 'township_id');
    }

    public function siteProgresses()
    {
        return $this->hasMany(siteProgress::class, 'project_id');
    }

    public function albumTests()
    {
        return $this->hasMany(albumTest::class, 'project_id');
    }

    public function albumTestsImage()
    {
        return $this->hasManyThrough(AlbumTestImage::class, albumTest::class, 'project_id', 'album_tests_id', 'id', 'id');
    }

    public function siteProgressesImage()
    {
        return $this->hasManyThrough(Image::class, siteProgress::class);
    }

    public function unitprice()
    {
        return $this->hasMany(UnitPrice::class);
    }
}
