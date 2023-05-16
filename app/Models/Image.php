<?php

namespace App\Models;

use App\Models\siteProgress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
     use HasFactory;
      protected $fillable=[
        'image',
        'site_progress_id',
    ];
       public function siteprogress(){
        return $this->belongsTo(siteProgress::class);
    }
}
