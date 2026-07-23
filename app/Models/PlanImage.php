<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class PlanImage extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'image',
    ];
}
