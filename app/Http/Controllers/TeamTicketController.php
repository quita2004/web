<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Employees;
use App\Tickets;
use App\TicketRelaters;
use App\TeamId;
use DateTime;


class TeamTicketController extends Controller
{
    //
   public function getAllTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('team_id', '=', $user->team_id)->get();
        return view('ds_teamticket/allTicket',['ticket'=>$ticket, 'page'=>'Tất cả']);
    }
    public function getNewTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('team_id', '=', $user->team_id)->where('status', '=', 1)->get();
        return view('ds_teamticket/allTicket',['ticket'=>$ticket, 'page'=>'New']);
    }
    public function getInprogressTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('team_id', '=', $user->team_id)->where('status', '=', 2)->get();
        return view('ds_teamticket/allTicket',['ticket'=>$ticket, 'page'=>'Inprogress']);
    }
    public function getFeedBackTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('team_id', '=', $user->team_id)->where('status', '=', 4)->get();
        return view('ds_teamticket/allTicket',['ticket'=>$ticket, 'page'=>'FeedBack']);
    }
     public function getCloseTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('team_id', '=', $user->team_id)->where('status', '=', 5)->get();
        return view('ds_teamticket/allTicket',['ticket'=>$ticket, 'page'=>'Close']);
    }
    public function getOutOfDateTicket(){
        $user = Auth::user();
        $time = new DateTime();
        $ticket = Tickets::where('team_id', '=', $user->team_id)->where('deadline', '<',  $time)->where('status', '!=', 5)->get();
        return view('ds_teamticket/allTicket',['ticket'=>$ticket, 'page'=>'Date Of Time']);
    }
}
