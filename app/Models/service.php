<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
class service extends BaseModel
{
    use HasFactory;

    
    protected $fillable = [
        'image',
        'icon',
        'title',
        'description',
        'features',
    ];

}
