<?php
//composer dumpautoload


use App\TeamId;
use App\Position;
use App\TicketRelaters;
use App\Tickets;
use App\TicketRead;

function checkPositionStatus($ticket){

    $result = array();

    $status = $ticket->status;

    //nguoi tao
    if(Auth::user()->id == $ticket->create_by){
        array_push($result, 6);
        if($status == 3){
            array_push($result, 4, 5);
        } else if($status == 4){
            array_push($result, 5);
        }
    }

    //nguoi thuc hien
    if(Auth::user()->id == $ticket->assigned_to){
        if($status == 1){
            array_push($result, 2);
        } else if($status == 2){
            array_push($result, 3);
        } else if($status == 3){
            array_push($result, 0);
        } else if($status == 4){
            array_push($result, 2);
        }
    }

    //leader team
    if(is_leader(Auth::user()->id) > 0){
        if($status == 1){
           array_push($result, 2); 
       } else if($status == 2){
           array_push($result, 3); 
       } else if($status == 3){
           array_push($result, 4); 
       } else if($status == 4){
           array_push($result, 2); 
       }
   }

   //nguoi quyen cong ty
   if(is_leader(Auth::user()->id) == 2){
    array_push($result, 6);

    if($status == 1){
       array_push($result, 2); 
   } else if($status == 2){
       array_push($result, 3); 
   } else if($status == 3){
       array_push($result, 4); 
   } else if($status == 4){
       array_push($result, 2, 5); 
   }
}

return $result;

}

function is_leader($id){
    $team = TeamId::where('id_leader',$id)->get();
    if(count($team) != 0){
        return $team[0]->id;
    } else 
    return 0;
}

function is_subleader($id){
    $team = TeamId::where('id_subleader',$id)->get();
    if(count($team) != 0){
        return $team[0]->id;
    } else 
    return 0;
}

function positionCompany($id){

    if(is_leader($id) == 2){
        return 1;
    } else 
    return 0;
}

function positionTeam($id, $teamid){
    $team = TeamId::where('id_leader',$id)->get();
    $subteam = TeamId::where('id_subleader',$id)->get();
    if ($teamid == 1){
        if(count($team) != 0){
            return 1;
        } else 
        return 0;
    } else if($teamid == 2){
        if(count($subteam) != 0){
            return 2;
        } else 
        return 0;
    }
    return 0;
}

function isViewEdit($idticket){
    $result = false;
    $ticket = Tickets::find($idticket);

    $user = Auth::user();

    if($user->id == $ticket->create_by || $user->id == $ticket->assigned_to
        || is_leader($user->id) > 0 || is_subleader($user->id) == $ticket->team_id){
        $result = true;
    }


    $ticket = TicketRelaters::where('ticket_id',$idticket)->get();
    foreach ($ticket as $tk ) {
        if($tk->employee_id == $user->id){
            return true;
        }
    }
    return $result;
}

function isEdit($idticket){
    $result = false;
    $ticket = Tickets::find($idticket);

    $user = Auth::user();

    if($user->id == $ticket->create_by || $user->id == $ticket->assigned_to
        || positionCompany($user->id) > 0 || positionTeam($user->id, $ticket->team_id) > 0){
        $result = true;
    }


    $ticket = TicketRelaters::where('ticket_id',$idticket)->get();
    foreach ($ticket as $tk ) {
        if($tk->employee_id == $user->id){
            return true;
        }
    }
    return $result;
}

function isViewTeam(){
    $result = false;

    $user = Auth::user();

    if(is_leader($user->id) > 0 || is_subleader($user->id) > 0){
        $result = true;
    }

    return $result;
}

function isViewIt(){
    $result = false;

    $user = Auth::user();

    if(is_leader($user->id) > 0){
        $result = true;
    }

    return $result;
}

function isRead($idticket){

    $result = false;
    $ticket = TicketRead::where('ticket_id', $idticket)->get();

    $user = Auth::user();

    foreach($ticket as $tk){
        if($tk->employee_id == $user->id){
            $result = true;
        }
    }

    return $result;
}

function readMyTicket($type){
    $result = 0;
    $user = Auth::user();

    //all
    if($type == 0){
        $ticket = Tickets::where('create_by', $user->id)->get();
    } else if($type > 0 && $type < 4){
        //trang thai = New, Inprogress, Resolved
        $ticket = Tickets::where('create_by', $user->id)->where('status', $type)->get();
    } else if($type == 4){
        //het han
        $time = new DateTime();
        $ticket = Tickets::where('create_by', '=', $user->id)->where('deadline', '<',  $time)->where('status', '!=', 5)->get();
    }

    //dem ticket chua doc
    if(isset($ticket)){
        foreach($ticket as $tk){
            if(!isRead($tk->id)){
                $result ++;
            }
        }
    }
    

    return $result;
}


function readRelaterTicket($type){
    $result = 0;
    $user = Auth::user();
    $reticket = TicketRelaters::where('employee_id','=', $user->id)->get();
    $ticket = array();

    if($type == 0){
        //new
        foreach ($reticket as $rt) {
            array_push($ticket,$rt->ticketTo);
        }
    } else if($type > 0 && $type < 4){
        //trang thai = New, Inprogress, Resolved
        foreach ($reticket as $rt) {
            if($rt->ticketTo->status == $type){
                array_push($ticket,$rt->ticketTo);
            }

        }
    } else if($type == 4){
        //het han
        $time = new DateTime();
        foreach ($reticket as $rt) {
            if($rt->ticketTo->deadline < $time && $rt->ticketTo->status != 5){
                array_push($ticket,$rt->ticketTo);
            }

        }
    }

    //dem trang thai chua doc
    if(isset($ticket)){
        foreach($ticket as $tk){
            if(!isRead($tk->id)){
                $result ++;
            }
        }
    }


    return $result;
}

function readAssingTicket($type){
    $result = 0;
    $user = Auth::user();

    //all
    if($type == 0){
        $ticket = Tickets::where('assigned_to', $user->id)->get();
    } else if($type > 0 && $type < 5){
        //trang thai = New, Inprogress, Resolved
        $ticket = Tickets::where('assigned_to', $user->id)->where('status', $type)->get();
    } else if($type == 5){
        //het han
        $time = new DateTime();
        $ticket = Tickets::where('assigned_to', '=', $user->id)->where('deadline', '<',  $time)->where('status', '!=', 5)->get();
    }

    //dem ticket chua doc
    if(isset($ticket)){
        foreach($ticket as $tk){
            if(!isRead($tk->id)){
                $result ++;
            }
        }
    }
    

    return $result;
}

function readTeamTicket($type){
    $result = 0;
    $user = Auth::user();

    //all
    if($type == 0){
        $ticket = Tickets::where('team_id', $user->team_id)->get();
    } else if($type > 0 && $type < 6){
        //trang thai = New, Inprogress, Resolved
        $ticket = Tickets::where('team_id', $user->team_id)->where('status', $type)->get();
    } else if($type == 6){
        //het han
        $time = new DateTime();
        $ticket = Tickets::where('team_id', '=', $user->team_id)->where('deadline', '<',  $time)->where('status', '!=', 5)->get();
    }

    //dem ticket chua doc
    if(isset($ticket)){
        foreach($ticket as $tk){
            if(!isRead($tk->id)){
                $result ++;
            }
        }
    }
    

    return $result;
}

function readItTicket($type){
    $result = 0;
    $user = Auth::user();

    //all
    if($type == 0){
        $ticket = Tickets::get();
    } else if($type > 0 && $type < 6){
        //trang thai = New, Inprogress, Resolved
        $ticket = Tickets::where('status', $type)->get();
    } else if($type == 6){
        //het han
        $time = new DateTime();
        $ticket = Tickets::where('deadline', '<',  $time)->where('status', '!=', 5)->get();
    }

    //dem ticket chua doc
    if(isset($ticket)){
        foreach($ticket as $tk){
            if(!isRead($tk->id)){
                $result ++;
            }
        }
    }
    

    return $result;
}



?>