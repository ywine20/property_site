<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class albumTest extends Model
{
    use HasFactory;

    public function albumTestImages()
    {
        return $this->hasMany(AlbumTestImage::class, 'album_tests_id');
    }
}
