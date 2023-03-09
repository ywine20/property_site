<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumDocument extends Model
{
    use HasFactory;
    protected $fillable=[
        'documents',
        'album_id',
        'project_id',
        'date',
        'time',
    ];
     public function project()
    {
        return $this->hasMany(Project::class);
    }
}
