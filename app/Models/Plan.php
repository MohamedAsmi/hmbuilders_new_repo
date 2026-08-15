<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Plan extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'type',
        'title',
        'location',
        'description',
    ];
}
