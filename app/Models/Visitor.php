<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable= [
        'url',
        'ip_address',
        'session_id',
        'user_agent',
        'visited_date'
    ];
}
