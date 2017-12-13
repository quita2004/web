<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employees;
use App\Tickets;
use App\TicketRelaters;
use App\TeamId;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

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
				'created_at'=> new DateTime(),
				'reads'=> 0
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
		return redirect('user/create')->with('thongbao', 'Thêm thành công');
	}

	public function getAllMyTicket(){
		$user = Auth::user();
		$ticket = Tickets::where('create_by', '=', $user->id)->get();

		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'Tất cả']);
	}
	public function getNewMyTicket(){
		$user = Auth::user();
		$ticket = Tickets::where('create_by', '=', $user->id)->where('status', '=', 1)->get();
		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'New']);
	}
	public function getInprogressMyTicket(){
		$user = Auth::user();
		$ticket = Tickets::where('create_by', '=', $user->id)->where('status', '=', 2)->get();
		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'Inprogress']);
	}
	public function getResolvedMyTicket(){
		$user = Auth::user();
		$ticket = Tickets::where('create_by', '=', $user->id)->where('status', '=', 3)->get();
		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'Resolved']);
	}
	public function getOutOfDateMyTicket(){
		$user = Auth::user();
		$time = new DateTime();
		$ticket = Tickets::where('create_by', '=', $user->id)->where('deadline', '<',  $time)->where('status', '!=', 5)->get();
		return view('ds_myticket/allTicket',['ticket'=>$ticket, 'page'=>'Date Of Time']);
	}
}
