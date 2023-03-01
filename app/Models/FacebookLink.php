<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Project;

class FacebookLink extends Model
{
    use HasFactory;
    protected $table = 'facebooklinks';
    protected $fillable = [
        'project_post_link',
        'description',
        'picture',
    ];

    // public function projects()
    // {
    //     return $this->belongsTo(Project::class);
    // }
}
