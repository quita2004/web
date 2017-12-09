<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    //
    protected $table = "ticket_comment";


    public function employee(){
    	return $this->hasMany('App\Employees', 'id', 'employee_id');
    }
}
