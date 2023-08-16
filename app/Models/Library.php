<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable = ['title_ar', 'title_en', 'description_ar', 'description_en'];

//    public function images()
//    {
//        return $this->hasMany(Image::class, "library_id", 'id');
//    }

    public function images()
    {
        return $this->morphMany(Image::class, 'fileable', 'fileable_type', 'fileable_id', 'id');
    }
}
