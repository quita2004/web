<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Employees;
use App\Tickets;
use App\TicketRelaters;
use App\TeamId;
use DateTime;


class TicketAssignController extends Controller
{
    //
   public function getAllTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('assigned_to', '=', $user->id)->get();
        return view('ds_assignticket/allTicket',['ticket'=>$ticket, 'page'=>'Tất cả', 'site'=>31]);
    }
    public function getNewTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('assigned_to', '=', $user->id)->where('status', '=', 1)->get();
        return view('ds_assignticket/allTicket',['ticket'=>$ticket, 'page'=>'New', 'site'=>32]);
    }
    public function getInprogressTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('assigned_to', '=', $user->id)->where('status', '=', 2)->get();
        return view('ds_assignticket/allTicket',['ticket'=>$ticket, 'page'=>'Inprogress', 'site'=>33]);
    }
    public function getFeedBackTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('assigned_to', '=', $user->id)->where('status', '=', 4)->get();
        return view('ds_assignticket/allTicket',['ticket'=>$ticket, 'page'=>'Resolved', 'site'=>34]);
    }
    public function getOutOfDateTicket(){
        $user = Auth::user();
        $time = new DateTime();
        $ticket = Tickets::where('assigned_to', '=', $user->id)->where('deadline', '<',  $time)->where('status', '!=', 5)->get();
        return view('ds_assignticket/allTicket',['ticket'=>$ticket, 'page'=>'Date Of Time', 'site'=>35]);
    }
}
