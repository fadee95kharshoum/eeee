<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'path', 'icon', 'section'];
    // protected $fillable = ['name_en','name_ar','description_en', 'description_ar', 'path', 'icon', 'section'];

}
