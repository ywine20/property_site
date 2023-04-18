<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siteProgress extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'images'];

    protected $casts = [
        'images' => 'array',
    ];

    // public function setFilenamesAttribute($value)
    // {
    //     $this->attributes['filenames'] = json_encode($value);
    // }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
