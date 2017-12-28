<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Employees;
use App\Tickets;
use App\TicketRelaters;
use App\TeamId;
use DateTime;


class ItTicketController extends Controller
{

    public function getAllTicket(){
        $user = Auth::user();
        $ticket = Tickets::get();
        return view('ds_itticket/allTicket',['ticket'=>$ticket, 'page'=>'Tất cả', 'site'=>51]);
    }
    public function getNewTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('status', '=', 1)->get();
        return view('ds_itticket/allTicket',['ticket'=>$ticket, 'page'=>'New', 'site'=>52]);
    }
    public function getInprogressTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('status', '=', 2)->get();
        return view('ds_itticket/allTicket',['ticket'=>$ticket, 'page'=>'Inprogress', 'site'=>53]);
    }
    public function getFeedBackTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('status', '=', 4)->get();
        return view('ds_itticket/allTicket',['ticket'=>$ticket, 'page'=>'FeedBack', 'site'=>54]);
    }
    public function getOutOfDateTicket(){
        $user = Auth::user();
        $time = new DateTime();
        $ticket = Tickets::where('deadline', '<',  $time)->where('status', '!=', 5)->get();
        return view('ds_itticket/allTicket',['ticket'=>$ticket, 'page'=>'Date Of Time', 'site'=>55]);
    }
    public function getCloseTicket(){
        $user = Auth::user();
        $ticket = Tickets::where('status', '=', 5)->get();
        return view('ds_itticket/allTicket',['ticket'=>$ticket, 'page'=>'Close', 'site'=>56]);
    }

}
