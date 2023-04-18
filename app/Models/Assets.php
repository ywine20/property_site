<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_id',
        'project_id',
        'site_progress',
        'legal_document',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}

