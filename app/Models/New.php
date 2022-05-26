<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class New extends Model
{
    use HasFactory;
    protected $filable=['user_id','image','content','title'];
}
