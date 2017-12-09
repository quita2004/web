<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamId extends Model
{
    //
    protected $table = "team_id";
    public $timestamps = false;

    public function employees(){
    	return $this->hasMany('App\Employees', 'team_id', 'id');
    }
}
