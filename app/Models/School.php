<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['instrument', 'logo', 'email'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getTeacher()
    {
        return $this->users()->where('type', '=', 2)->first();
    }

    public function getStudents(){
        return $this->users()->where('type', '=', 3);
    }    

    private static function filterByType($collection, $type){
        return $collection->filter(function ($item) use($type){
            return $item->status === $type;
        })->values();
    }
}
