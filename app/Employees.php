<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //
    protected $table = "employees";
    public $timestamps = false;

    public function ticket(){
    	return $this->hasMany('App\Ticket', 'create_by', 'id');
    }
    public function comment(){
    	return $this->hasMany('App\TicketComment', 'employee_id', 'id');
    }
    public function ticketRelaters(){
    	return $this->hasMany('App\TicketRelaters', 'employee_id', 'id');
    }
    public function teamId(){
    	return $this->hasOne('App\TeamId', 'id', 'team_id');
    }
}
