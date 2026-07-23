<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
class team extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'qualification',
        'position',
    ];

  
}


