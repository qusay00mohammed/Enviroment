<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListGoal extends Model
{
    use HasFactory;
    protected $fillable = ['description_goal_ar', 'description_goal_en', 'goal_id'];

    public function basic_goal()
    {
        return $this->belongsTo(Goal::class, 'goal_id', 'id');
    }
}
