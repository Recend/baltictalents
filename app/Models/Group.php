<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }


    public function teacher (){
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function user (){
        return $this->hasMany(User::class);
    }

    public function lectures (){
        return $this->hasMany(Lecture::class);
    }

}
