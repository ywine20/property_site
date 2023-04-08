<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'random_code',
        'tier',
        'project_name',
        'site_progress',
        'legal_document',
        'site_progress_id',
        'legal_document_id',
    ];
}
