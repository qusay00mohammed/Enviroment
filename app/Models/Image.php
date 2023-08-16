<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

//    protected $fillable = ['image', 'library_id'];
    protected $fillable = ['filename', 'fileable_id', 'fileable_type'];

    public function fileable()
    {
        return $this->morphTo();
    }
}
