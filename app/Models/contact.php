<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
class contact extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];
}
