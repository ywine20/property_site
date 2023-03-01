<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'category_name',
    ];

    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
