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

    public function getPosterUrl(){
        $imgExtensions = [
            'png',
            'jpg',
            'jpeg',
            'svg',
            'gif',
        ];
        $defaultPosterUrl = "http://127.0.0.1:8000/storage/files/shares/default.jpg";
        $pinfo = pathinfo($this->poster_url);
        $isValid = $pinfo && isset($pinfo['extension']) && in_array($pinfo['extension'], $imgExtensions);

        return $isValid ? $this->poster_url : $defaultPosterUrl;
    }
}
