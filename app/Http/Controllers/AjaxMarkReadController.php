<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Employees;
use App\Tickets;
use App\TicketRelaters;
use App\TeamId;
use App\TicketComment;
use App\Position;
use App\TicketRead;


class AjaxMarkReadController extends Controller
{
    //
    public function postRead(Request $request,$idticket){
        if($request -> ajax()){
            $user = Auth::user();
            if($request->ischeck == 'true'){
                $ticket_read = new TicketRead;
                $ticket_read->ticket_id = $idticket;
                $ticket_read->employee_id = $user->id;
                $ticket_read->save();

                return view('layout.menu');
            } else{
                TicketRead::where('ticket_id', $idticket)->where('employee_id', $user->id)->delete();
                return view('layout.menu');
            }

        }
    }    

}
