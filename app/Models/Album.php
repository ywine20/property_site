<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Project;

class Album extends Model
{
    use HasFactory;
    protected $fillable=[

       'title',
    ];

   public function projects()
    {
        return $this->belongsToMany(Project::class, 'Album_documents');
    }
}
