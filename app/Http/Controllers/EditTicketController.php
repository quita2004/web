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
            if($ticket->status != 3&& $ticket->status != 5 && $ticket->status != 6){
                $isEditTeam = 1;
                $isEditPriority = 1;
                $isEditDeadline = 1;
                $isEditAssign = 1;
            }
            
        }

        if($user->id == $ticket->create_by || positionCompany($user->id) == 1 || positionTeam($user->id, $ticket->team_id) > 0){
            if($ticket->status != 3 && $ticket->status != 5 && $ticket->status != 6){
                $isEditRelater = 1;
            }
            
        }

        if($user->id == $ticket->create_by || $user->id == $ticket->assigned_to 
            || positionCompany($user->id) == 1 || positionTeam($user->id, $ticket->team_id) > 0){
            $isComment = 1;
            if( $ticket->status != 5 && $ticket->status != 6){
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
                
                echo "<div class='comment-detail'>
                <div class='user'>
                <div class='avata'><img src='img/avata.jpg' alt=''></div>
                <div class='info'>
                <a href='#'>".$comment->employee[0]->name."</a>
                <p class='time-post'><i class='fa fa-clock-o' aria-hidden='true'></i>".$comment->created_at."</p>
                </div>
                </div>

                <div class='content-post'>
                <p>".$comment->note."</p>
                <p>".$comment->content."</p>

                </div>
                </div>";
                
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
                    if($ticket->status != 3&& $ticket->status != 5 && $ticket->status != 6){
                        $isEditTeam = 1;
                        $isEditPriority = 1;
                        $isEditDeadline = 1;
                        $isEditAssign = 1;
                    }

                }

                if($user->id == $ticket->create_by || positionCompany($user->id) == 1 || positionTeam($user->id, $ticket->team_id) > 0){
                    if($ticket->status != 3 && $ticket->status != 5 && $ticket->status != 6){
                        $isEditRelater = 1;
                    }

                }

                if($user->id == $ticket->create_by || $user->id == $ticket->assigned_to 
                    || positionCompany($user->id) == 1 || positionTeam($user->id, $ticket->team_id) > 0){
                    $isComment = 1;
                    if( $ticket->status != 5 && $ticket->status != 6){
                        $isEditStatus = 1;
                    }

                }
                if(in_array(0, $positionStatus) && count($positionStatus) == 1){
                    $isEditStatus = 0;
                }

                $positionChange['changeteam'] = $isEditTeam;
                $positionChange['changepriority'] = $isEditPriority;
                $positionChange['changedeadline'] = $isEditDeadline;
                $positionChange['changerelater'] = $isEditRelater;
                $positionChange['changeassign'] = $isEditAssign;
                $positionChange['changestatus'] = $isEditStatus;
                $positionChange['changecomment'] = $isComment;

                // $positionChange['edit'] = isEdit($idticket);

                $list_assign = "<label class='control-label' for='assign'>Thay đổi người thực hiện</label>
                <select class='form-control' id='assign' name='assign'>";
                foreach($employees as $e){
                    $select = $ticket->assigned_to == $e->id ? ' selected ' : '';
                    $list_assign .=" <option value='".$e->id."'".$select.">". $e->name ."</option>";
                }
                $list_assign.= "</select>";

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

                $newcomment =  "<div class='comment-detail'>
                <div class='user'>
                <div class='avata'><img src='img/avata.jpg' alt=''></div>
                <div class='info'>
                <a href='#'>".$comment->employee[0]->name."</a>
                <p class='time-post'><i class='fa fa-clock-o' aria-hidden='true'></i>".$comment->created_at."</p>
                </div>
                </div>

                <div class='content-post'>
                <p>".$comment->note."</p>
                <p>".$comment->content."</p>

                </div>
                </div>";

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

            $newcomment =  "<div class='comment-detail'>
            <div class='user'>
            <div class='avata'><img src='img/avata.jpg' alt=''></div>
            <div class='info'>
            <a href='#'>".$user->name."</a>
            <p class='time-post'><i class='fa fa-clock-o' aria-hidden='true'></i>".$ticket_comment->created_at."</p>
            </div>
            </div>

            <div class='content-post'>
            <p>".$ticket_comment->note."</p>
            <p>".$ticket_comment->content."</p>

            </div>
            </div>";

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

            $ticket = Tickets::find($idticket);
            $positionStatus = checkPositionStatus($ticket);


            $block_status = "<label class='control-label status1' for='status'>Trạng thái</label>  
            <select class='form-control status1' id='status' name='status'>";
            
            $select1 = ($ticket->status == 1) ? ' selected ' : '';
            $hidden1 = (in_array(1, $positionStatus)) ? "<option value='1' ".$select1.">New</option>" : '';

            $select2 = ($ticket->status == 2) ? ' selected ' : '';
            $hidden2 = (in_array(2, $positionStatus)) ? "<option value='2' ".$select2.">Inprogress</option>" : '';

            $select3 = ($ticket->status == 3) ? ' selected ' : '';
            $hidden3 = (in_array(3, $positionStatus)) ? "<option value='3' ".$select3.">Resolved</option>" : '';

            $select4 = ($ticket->status == 4) ? ' selected ' : '';
            $hidden4 = (in_array(4, $positionStatus)) ? "<option value='4' ".$select4.">Feedback</option>" : '';

            $select5 = ($ticket->status == 5) ? ' selected ' : '';
            $hidden5 = (in_array(5, $positionStatus)) ? "<option value='5' ".$select5.">Close</option>" : '';

            $select6 = ($ticket->status == 6) ? ' selected ' : '';
            $hidden6 = (in_array(6, $positionStatus)) ? "<option value='6' ".$select6.">Cancelled</option>" : '';


            $block_status .=$hidden2.$hidden3.$hidden4.$hidden5.$hidden6;
            
            $block_status .= "</select>";

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
            

            


            $thongbao = "Thay đổi trạng thái thành công";

            return ['block-status'=>$block_status, 'status'=>$status, 'thongbao'=>$thongbao];
        }
    }

}
