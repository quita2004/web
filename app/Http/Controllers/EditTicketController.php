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
        $ticket = Tickets::find($idticket);
        $relaters = TicketRelaters::where('ticket_id',$idticket)->get();
        $comment = TicketComment::where('ticket_id',$idticket)->get();
        $employees = Employees::where('team_id',$ticket->team_id)->get();

        $user = Auth::user();

        //mang luu cac dk duoc thay doi
        $positionChange = array();

        // app/function/function.php/
        // trả về mảng các trang thái được chọn tiếp theo
        $positionStatus = checkPositionStatus($ticket);

        //DK thay doi team it
        $isEditTeam = 0;

        //DK thay doi muc do uu tien
        $isEditPriority = 0;

        //DK thay doi deadline
        $isEditDeadline = 0;

        //DK thay doi nguoi lien quan
        $isEditRelater = 0;

        //DK thay doi nguoi thuc hien
        $isEditAssign = 0;

        //Đk thay đổi trạng thái
        $isEditStatus = 0;

        //dk comment
        $isComment = 0;

        if(positionCompany($user->id) == 1 || positionTeam($user->id, $ticket->team_id) > 0){
            if($ticket->status != 3|| $ticket->status != 5 || $ticket->status != 6){
                $isEditTeam = 1;
                $isEditPriority = 1;
                $isEditDeadline = 1;
                $isEditAssign = 1;
            }
            
        }

        if($user->id == $ticket->create_by || positionCompany($user->id) == 1 || positionTeam($user->id, $ticket->team_id) > 0){
            if($ticket->status != 3 || $ticket->status != 5 || $ticket->status != 6){
                $isEditRelater = 1;
            }
            
        }

        if($user->id == $ticket->create_by || $user->id == $ticket->assigned_to 
            || positionCompany($user->id) == 1 || positionTeam($user->id, $ticket->team_id) > 0){
            $isComment = 1;
            if($ticket->status != 3 || $ticket->status != 5 || $ticket->status != 6){
                $isEditStatus = 1;
            }

        }
        if(in_array(0, $positionStatus) && count($positionStatus) == 1){
            $isEditStatus = 0;
        }

        $positionChange['team'] = $isEditTeam;
        $positionChange['priority'] = $isEditPriority;
        $positionChange['deadline'] = $isEditDeadline;
        $positionChange['relater'] = $isEditRelater;
        $positionChange['assign'] = $isEditAssign;
        $positionChange['status'] = $isEditStatus;
        $positionChange['comment'] = $isComment;

        $positionChange['edit'] = isEdit($idticket);

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
        $comment = $request->comment;
        $ticket_comment = new TicketComment;
        $ticket_comment->ticket_id = $idticket;
        $ticket_comment->employee_id = $user->id;
        $ticket_comment->content = $comment;
        $ticket_comment->type = 0;
        $ticket_comment->note = '';
        $ticket_comment->save();

        return redirect('user/edit/'.$idticket);
    }

    public function postEditTeamId(Request $request, $idticket){
        $team = TeamId::where('id', $request->team_id)->get();
        DB::table('tickets')->where('id', $idticket)->update(['team_id' => $request->team_id]);
        DB::table('tickets')->where('id', $idticket)->update(['assigned_to' => $team[0]->id_leader]);

        return redirect('user/edit/'.$idticket)->with('thongbao','Thay đổi bộ phận IT thành công');
    }

    public function postEditPriority(Request $request, $idticket){
        $ticket = Tickets::find($idticket);
        $oldpriority = $ticket->priority;
        $priority = $request->priority;
        DB::table('tickets')->where('id', $idticket)->update(['priority' => $request->priority]);
        if($oldpriority == 1){
            $oldpriority = 'Thấp';
        } else if($oldpriority == 2){
            $oldpriority = 'Trung bình';
        } else if($oldpriority == 3){
            $oldpriority = 'Cao';
        } else if($oldpriority == 4){
            $oldpriority = 'Khẩn cấp';
        } 
        if($priority == 1){
            $priority = 'Thấp';
        } else if($priority == 2){
            $priority = 'Trung bình';
        } else if($priority == 3){
            $priority = 'Cao';
        } else if($priority == 4){
            $priority = 'Khẩn cấp';
        } 

        $user = Auth::user();
        $comment = $request->change_priority;
        $ticket_comment = new TicketComment;
        $ticket_comment->ticket_id = $idticket;
        $ticket_comment->employee_id = $user->id;
        $ticket_comment->content = 'Lý do: '.$comment;
        $ticket_comment->type = 2;
        $ticket_comment->note = 'Thay đổi mức độ ưu tiên: '.$oldpriority.' => '.$priority;
        $ticket_comment->save();


        return redirect('user/edit/'.$idticket)->with('thongbao', 'Thay đổi mức độ ưu tiên thành công');
    }
    public function postEditDeadline(Request $request, $idticket){
        $ticket = Tickets::find($idticket);
        $olddeadline = substr( $ticket->deadline,  0, 10 );
        DB::table('tickets')->where('id', $idticket)->update(['deadline' => $request->date]);
        $newdeadline = substr( $ticket->deadline,  0, 10 );

        $user = Auth::user();
        $comment = $request->change_deadline;
        $ticket_comment = new TicketComment;
        $ticket_comment->ticket_id = $idticket;
        $ticket_comment->employee_id = $user->id;
        $ticket_comment->content = 'Lý do: '.$comment;
        $ticket_comment->type = 3;
        $ticket_comment->note = 'Thay đổi deadline: '.$olddeadline.' => '.$newdeadline;
        $ticket_comment->save();

        return redirect('user/edit/'.$idticket)->with('thongbao', 'Thay đổi deadline thành công');
    }
    public function postEditRelaters(Request $request, $idticket){
        DB::table('ticket_relaters')->where('ticket_id',$idticket)->delete();
        if(isset($request->relaters)){
            foreach ($request->relaters as $rl) {
                $tr = new TicketRelaters;
                $tr->employee_id = $rl;
                $tr->ticket_id = $idticket;
                $tr->save();
            }
        }
        return redirect('user/edit/'.$idticket)->with('thongbao', 'Thay đổi người liên quan thành công');
    }

    public function postEditAssign(Request $request, $idticket){
        DB::table('tickets')->where('id', $idticket)->update(['assigned_to' => $request->assign]);

        return redirect('user/edit/'.$idticket)->with('thongbao', 'Thay đổi người thực hiện thành công');
    }

    public function postEditStatus(Request $request, $idticket){
        DB::table('tickets')->where('id', $idticket)->update(['status' => $request->status]);

        return redirect('user/edit/'.$idticket)->with('thongbao', 'Thay đổi trạng thái thành công');
    }

}
