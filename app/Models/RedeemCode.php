<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'random_code',
        'project_id',
        'site_progress',
        'album',
        'tier',
    ];
}
