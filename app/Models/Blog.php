<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['title','sub_title','image','description'];
}
