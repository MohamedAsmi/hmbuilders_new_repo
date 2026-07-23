<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
class inquire extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'mobile',
        'service',
        'message'
    ];
}
