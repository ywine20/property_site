<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumProgressAllowance extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'site_progress',
        'album',
        'site_progress_id',
        'album_id',
    ];
}
