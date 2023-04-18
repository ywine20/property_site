<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteProgress extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'project_id',
        'site_gallery_id',
        'cover_image',
    ];
}
