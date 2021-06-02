<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'poster_url', 'file_id'];
    
    public function lessonDifficulties(){
        return $this->hasMany(LessonsDifficulties::class);
    }

    public function getAvgDifficulty(){
        $lessonDifficulties = $this->lessonDifficulties()->get();
        $lessonCount = count($lessonDifficulties);
        if($lessonCount === 0){
            return 0;
        }

        $sum = 0;
        foreach($lessonDifficulties as $ldiff){
            $sum += (int)$ldiff->value;
        }

        return round($sum / $lessonCount);
    }
}
