<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedProjects extends Model
{
    use HasFactory;
    protected $fillable = [
        'redeem_code_id',
        'project_id',
    ];
}
