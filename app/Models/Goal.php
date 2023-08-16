<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;
    protected $fillable = ['title_ar', 'title_en'];

    public function goals()
    {
        return $this->hasMany(ListGoal::class, 'goal_id', 'id');
    }
}
