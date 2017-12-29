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


class EditTicketController extends Controller
{
    //
    public function getEdit($idticket){
        $user = Auth::user();
        $ticket = Tickets::find($idticket);
        $relaters = TicketRelaters::where('ticket_id',$idticket)->get();
        $comment = TicketComment::where('ticket_id',$idticket)->get();
        $employees = Employees::where('team_id',$ticket->team_id)->get();

        $positionChange = positionChange($ticket);

        // app/function/function.php/
        // trả về mảng các trang thái được chọn tiếp theo
        $positionStatus = checkPositionStatus($ticket);

        //danh dau da doc
        if(!isRead($idticket)){
            $ticket_read = new TicketRead;
            $ticket_read->ticket_id = $idticket;
            $ticket_read->employee_id = $user->id;
            $ticket_read->save();
        }
        

        return view('editticket/editTicket', ['ticket'=>$ticket, 'relaters'=>$relaters, 'comment'=>$comment, 'employees'=>$employees, 'positionStatus'=>$positionStatus, 'positionChange'=>$positionChange]);
    }

    public function postComment(Request $request, $idticket){
        $user = Auth::user();
        if($request -> ajax()){
            if(isset($request->comment)){
                $id = DB::table('ticket_comment')->insertGetId(
                    [
                       'ticket_id' => $idticket,
                       'employee_id' => $user->id,
                       'content' => $request->comment,
                       'type' => 0,
                       'note' => ''
                   ]
               );

                $comment = TicketComment::find($id);
                
                return view('ajax.comment', ['cm'=>$comment]);
                
            }
        }
    }

    public function postEditTeamId(Request $request, $idticket){
        if($request -> ajax()){
            $ticket = Tickets::find($idticket);
            if($request->team_id != $ticket->team_id){
                $ticket = Tickets::find($idticket);
                $relaters = TicketRelaters::where('ticket_id',$idticket)->get();
                $comment = TicketComment::where('ticket_id',$idticket)->get();
                $employees = Employees::where('team_id',$ticket->team_id)->get();
                
                $user = Auth::user();
                $team = TeamId::where('id', $request->team_id)->get();
                DB::table('tickets')->where('id', $idticket)->update(['team_id' => $request->team_id]);
                DB::table('tickets')->where('id', $idticket)->update(['assigned_to' => $team[0]->id_leader]);

                $assign = Employees::find($team[0]->id_leader);
                $ticket = Tickets::find($idticket);

                $employees = Employees::where('team_id',$ticket->team_id)->get();

                $positionChange = positionChange($ticket);

                // app/function/function.php/
                // trả về mảng các trang thái được chọn tiếp theo
                $positionStatus = checkPositionStatus($ticket);

                $list_assign = '';
                $list_assign .= view('ajax.list_assign', ['ticket'=>$ticket, 'employees'=>$employees]);

                $thongbao = 'Thay đổi bộ phận IT thành công';

                return ['teamid'=>$team[0]->name, 'assign'=> $assign->name, 'list_assign'=>$list_assign, 'thongbao'=>$thongbao, 'positionChange'=>$positionChange];

            }

        }
    }

    public function postEditPriority(Request $request, $idticket){
        if($request -> ajax()){
            $user = Auth::user();
            $ticket = Tickets::find($idticket);
            $oldpriority = $ticket->priority;
            $priority = $request->priority;
            //Nếu mức độ ưu tiên đã thay đổi và có comment
            if($oldpriority != $priority && $request->change_priority != ''){

                DB::table('tickets')->where('id', $idticket)->update(['priority' => $request->priority]);

                if($oldpriority == 1){
                    $oldpriority = 'Thấp';
                } else if($oldpriority == 2){
                    $oldpriority = 'Bình thường';
                } else if($oldpriority == 3){
                    $oldpriority = 'Cao';
                } else if($oldpriority == 4){
                    $oldpriority = 'Khẩn cấp';
                } 
                if($priority == 1){
                    $priority = 'Thấp';
                } else if($priority == 2){
                    $priority = 'Bình thường';
                } else if($priority == 3){
                    $priority = 'Cao';
                } else if($priority == 4){
                    $priority = 'Khẩn cấp';
                } 

                $id = DB::table('ticket_comment')->insertGetId(
                    [
                        'ticket_id' => $idticket,
                        'employee_id' => $user->id,
                        'content' => 'Lý do: '. $request->change_priority,
                        'type' => 2,
                        'note' => 'Thay đổi mức độ ưu tiên: '.$oldpriority.' => '.$priority
                    ]
                );

                $comment = TicketComment::find($id);
                $newcomment = '';

                $newcomment .=  view('ajax.comment', ['cm'=>$comment]);

                $thongbao = 'Thay đổi mức độ ưu tiên thành công';

                return ['priority'=>$priority, 'newcomment'=>$newcomment, 'valp'=> $request->priority, 'thongbao'=>$thongbao];

            }
        }
    }

    public function postEditDeadline(Request $request, $idticket){
        if($request -> ajax()){
            $ticket = Tickets::find($idticket);
            $olddeadline = substr( $ticket->deadline,  0, 10 );
            DB::table('tickets')->where('id', $idticket)->update(['deadline' => $request->date]);
            $newdeadline = substr( $request->date,  0, 10 );

            $user = Auth::user();
            $comment = $request->change_deadline;
            $ticket_comment = new TicketComment;
            $ticket_comment->ticket_id = $idticket;
            $ticket_comment->employee_id = $user->id;
            $ticket_comment->content = 'Lý do: '.$comment;
            $ticket_comment->type = 3;
            $ticket_comment->note = 'Thay đổi deadline: '.$olddeadline.' => '.$newdeadline;
            $ticket_comment->save();

            $newcomment = '';
            $newcomment .=  view('ajax.comment', ['cm'=>$ticket_comment]);

            $thongbao = 'Thay đổi deadline thành công';

            return ['newdeadline'=>$newdeadline, 'newcomment'=>$newcomment, 'thongbao'=>$thongbao];
        }
    }

    public function postEditRelaters(Request $request, $idticket){
        if($request -> ajax()){
            DB::table('ticket_relaters')->where('ticket_id',$idticket)->delete();
            if(isset($request->relaters)){
                foreach ($request->relaters as $rl) {
                    $tr = new TicketRelaters;
                    $tr->employee_id = $rl;
                    $tr->ticket_id = $idticket;
                    $tr->save();
                }
            }

            $ticket = Tickets::find($idticket);
            $employees = Employees::where('team_id',$ticket->team_id)->get();
            

            $relaters = TicketRelaters::where('ticket_id',$idticket)->get();

            

            $thongbao = 'Thay đổi người liên quan thành công';

            $newrelater = '';
            if(isset($relaters)){
                foreach($relaters as $rl){
                    $newrelater .= $rl->employee->name.',';
                }
            }
            
            return ['newrelater'=>$newrelater, 'thongbao'=>$thongbao];
        }
    }

    public function postEditAssign(Request $request, $idticket){
        if($request -> ajax()){
            DB::table('tickets')->where('id', $idticket)->update(['assigned_to' => $request->assign]);
            $assign = Employees::find($request->assign);

            $thongbao = 'Thay đổi người thực hiện thành công';

            return ['assign'=>$assign->name, 'thongbao'=>$thongbao];
        }
        
    }

    public function postEditStatus(Request $request, $idticket){
        if($request -> ajax()){
            DB::table('tickets')->where('id', $idticket)->update(['status' => $request->status]);

            $user = Auth::user();
            $ticket = Tickets::find($idticket);

            $employees = Employees::where('team_id',$ticket->team_id)->get();

            $positionChange = array();

            
            $positionStatus = checkPositionStatus($ticket);


            $block_status = '';
            $block_status .= view('ajax.block_status', ['ticket'=>$ticket, 'positionStatus'=>$positionStatus]);

            if ($ticket->status == 1){
                $status = 'New';
            } else if ($ticket->status == 2){
                $status = 'Inprogress';
            } else if ($ticket->status == 3){
                $status = 'Resolved';
            } else if ($ticket->status == 4){
                $status = 'Feedback';
            } else if ($ticket->status == 5){
                $status = 'Close';
            } else if ($ticket->status == 6){
                $status = 'Cancelled';
            } 
            
            $positionChange = positionChange($ticket);

            $thongbao = "Thay đổi trạng thái thành công";

            return ['block-status'=>$block_status, 'status'=>$status,'positionChange'=>$positionChange, 'thongbao'=>$thongbao];
        }
    }

}
