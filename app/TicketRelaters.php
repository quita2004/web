<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketRelaters extends Model
{
    //
    protected $table = "ticket_relaters";
    public $timestamps = false;

    public function employee(){
    	return $this->belongsTo('App\Employees', 'employee_id', 'id');
    }
    public function ticketTo(){
    	return $this->belongsTo('App\Tickets', 'ticket_id', 'id');
    }
    
}
