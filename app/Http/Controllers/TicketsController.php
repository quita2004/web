<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employees;
use App\Tickets;
use App\TicketRelaters;
use App\TeamId;
use App\TicketRead;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Mail;

class TicketsController extends Controller
{
    //
	public function getTickets(){
		$employees = Employees::all();
		return view('create',['employees'=>$employees]);
	}

	public function postTickets(Request $request){
    	// echo $request->uutien;
		$this->validate($request,[
			'name' => 'required',
			'date' => 'required',
			'content' => 'required'
		],
		[
			'name.required' => 'Bạn phải điền tên công việc',
			'date.required' => 'Bạn phải chọn ngày',
			'content.required' => 'Bạn phải điền nội dung'
		]);

		if($request->hasFile('hinh')){
			$file = $request->file('hinh');
			$name = $file->getClientOriginalName();
			$hinh = str_random(4).'_'.$name;
			while(file_exists('upload/'.$hinh)){
				$hinh = str_random(4).'_'.$name;
			}
			$file->move("upload", $hinh);
		}
		else{
			$hinh = '';
		}
		$user = Auth::user()->id;

		$teamid = $request->team_id;
		$assign = TeamId::find($teamid)->id_leader;


		$id = DB::table('tickets')->insertGetId(
			[
				'subject' => $request->name,
				'content' => $request->content,
				'create_by' => $user,
				'status'=> 1,
				'priority'=> $request->uutien,
				'deadline'=> date($request->date),
				'assigned_to'=>$assign,
				'image'=> $hinh,
				'team_id'=> $request->team_id,
				'created_at'=> new DateTime()
			]
		);
		if(isset($request->relaters)){
			foreach ($request->relaters as $rl) {
				$tr = new TicketRelaters;
				$tr->employee_id = $rl;
				$tr->ticket_id = $id;
				$tr->save();
			}
		}

		//danh dau da doc
		if(!isRead($id)){
			$ticket_read = new TicketRead;
			$ticket_read->ticket_id = $id;
			$ticket_read->employee_id = $user;
			$ticket_read->save();
		}

		//gửi mail thong báo cho leader
		$ticket = Tickets::find($id);
		$user = Auth::user();
		
		$idleader = TeamId::find($request->team_id)->id_leader;
		$leader = Employees::find($idleader)->email;

		Mail::send('mails.noti', ['ticket'=>$ticket, 'relaters'=>$request->relaters], function($message) use ($leader){
			$message->from('quitn97@gmail.com', '');
			$message->to($leader)->subject('Thông báo công việc mới');
		});

		return redirect('user/create')->with('thongbao', 'Thêm thành công');
	}

	public function getAllMyTicket(){
		$user = Auth::user();
		$ticket = Tickets::where('create_by', '=', $user->id)->get();

		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'Tất cả', 'site'=>11]);
	}
	public function getNewMyTicket(){
		$user = Auth::user();
		$ticket = Tickets::where('create_by', '=', $user->id)->where('status', '=', 1)->get();
		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'New', 'site'=>12]);
	}
	public function getInprogressMyTicket(){
		$user = Auth::user();
		$ticket = Tickets::where('create_by', '=', $user->id)->where('status', '=', 2)->get();
		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'Inprogress', 'site'=>13]);
	}
	public function getResolvedMyTicket(){
		$user = Auth::user();
		$ticket = Tickets::where('create_by', '=', $user->id)->where('status', '=', 3)->get();
		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'Resolved', 'site'=>14]);
	}
	public function getOutOfDateMyTicket(){
		$user = Auth::user();
		$time = new DateTime();
		$ticket = Tickets::where('create_by', '=', $user->id)->where('deadline', '<',  $time)->where('status', '!=', 5)->get();
		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'Date Of Time', 'site'=>15]);
	}
}
