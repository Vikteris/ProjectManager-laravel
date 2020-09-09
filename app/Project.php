<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $fillable = ['title'];

    public function workers(){
        return $this->hasMany('App\Worker');
    }
}
