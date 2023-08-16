<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'short_description_ar',
        'short_description_en',
        'slug',
        'status',
        // 'facebook_link',
        // 'twitter_link',
        // 'instagram_link',
        'keywords_ar',
        'keywords_en',
        'visited_count',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'fileable', 'fileable_type', 'fileable_id', 'id');
    }

}
