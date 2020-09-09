<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public $fillable = ['name', 'project_id'];

    public function project(){
        return $this->belongsTo('App\Project');
    }
}