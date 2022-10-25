<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_User extends Model
{
    use HasFactory;


    public function group(){
        return $this->belongsToMany(Group::class,'group__users');
    }

}
