<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    //
	protected $table = "tickets";

	public function ticketCreateBy(){
		return $this->hasMany('App\Employees', 'id', 'create_by');
	}
	public function ticketAssignedTo(){
		return $this->hasMany('App\Employees', 'id', 'assigned_to');
	}
}
