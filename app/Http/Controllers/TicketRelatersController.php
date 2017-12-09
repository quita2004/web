<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Employees;
use App\Tickets;
use App\TicketRelaters;
use App\TeamId;
use DateTime;


class TicketRelatersController extends Controller
{
    //
    public function getAllReTicket(){
    	$user = Auth::user();
    	$reticket = TicketRelaters::where('employee_id','=', $user->id)->get();
    	$ticket = array();
    	foreach ($reticket as $rt) {
    		array_push($ticket,$rt->ticketTo);
    	}
    	return view('ds_reticket/allTicket', ['ticket'=>$ticket, 'page'=>'Tất cả']);
    }
    public function getNewReTicket(){
    	$user = Auth::user();
    	$reticket = TicketRelaters::where('employee_id','=', $user->id)->get();
    	$ticket = array();
    	foreach ($reticket as $rt) {
    		if($rt->ticketTo->status == 1){
    			array_push($ticket,$rt->ticketTo);
    		}
    		
    	}
    	return view('ds_reticket/allTicket', ['ticket'=>$ticket, 'page'=>'New']);
    }
    public function getInprogressReTicket(){
    	$user = Auth::user();
    	$reticket = TicketRelaters::where('employee_id','=', $user->id)->get();
    	$ticket = array();
    	foreach ($reticket as $rt) {
    		if($rt->ticketTo->status == 2){
    			array_push($ticket,$rt->ticketTo);
    		}
    		
    	}
    	return view('ds_reticket/allTicket', ['ticket'=>$ticket, 'page'=>'Inprogress']);
    }
    public function getResolvedReTicket(){
    	$user = Auth::user();
    	$reticket = TicketRelaters::where('employee_id','=', $user->id)->get();
    	$ticket = array();
    	foreach ($reticket as $rt) {
    		if($rt->ticketTo->status == 3){
    			array_push($ticket,$rt->ticketTo);
    		}
    		
    	}
    	return view('ds_reticket/allTicket', ['ticket'=>$ticket, 'page'=>'Resolved']);
    }
    public function getOutOfDateReTicket(){
    	$user = Auth::user();
    	$reticket = TicketRelaters::where('employee_id','=', $user->id)->get();
    	$ticket = array();
    	$time = new DateTime();
    	foreach ($reticket as $rt) {
    		if($rt->ticketTo->deadline < $time && $rt->ticketTo->status != 5){
    			array_push($ticket,$rt->ticketTo);
    		}
    		
    	}
    	return view('ds_reticket/allTicket', ['ticket'=>$ticket,'page'=>'Out Of Date']);
    }
}
