<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonsDifficulties extends Model
{
    use HasFactory;

    public $fillable = ['difficulty_id', 'value'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }
}
