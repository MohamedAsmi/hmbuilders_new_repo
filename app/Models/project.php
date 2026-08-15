<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
class project extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'subtitle',
        'location',
        'cover_image',
        'category',
        'year',
        'description',
    ];
}
