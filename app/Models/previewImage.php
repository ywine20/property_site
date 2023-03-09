<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class PreviewImage extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'small_img1',
        // 'small_img2',
        // 'small_img3',
        // 'small_img4',
        // 'small_img5',
        // 'small_img6',
        // 'small_img7',
        // 'small_img8',
        // 'small_img9',
        'image',
        'project_id',
    ];

    public function projects(){
        return $this->belongsTo(Project::class);
    }
}
