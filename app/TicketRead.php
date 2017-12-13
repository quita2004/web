<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketRead extends Model
{
    //
	protected $table = "ticket_read";
	public $timestamps = false;

	public function tickets(){
    	return $this->belongsTo('App\Tickets', 'ticket_id', 'id');
    }
}
