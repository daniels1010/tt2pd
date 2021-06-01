<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'poster_url', 'file_id'];

    public function getLessonDifficulties()
    {
        return LessonsDifficulties::where(['lesson_id' => $this->id])->get();
    }
}
