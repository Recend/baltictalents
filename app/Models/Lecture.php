<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    public function file(){
        return $this->hasMany(File::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }


}
