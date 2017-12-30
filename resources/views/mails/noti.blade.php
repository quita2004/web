<h1>Nhóm bạn có yêu cầu từ {{Auth::user()->name}}</h1>
<h3 class="title"><i class="fa fa-user" aria-hidden="true"></i> Nội dung</h3>
<div>
	{!! $ticket->content !!}
</div>
@if($ticket->image)
<br>
<div>
	<img src="upload/{{$ticket->image}}" alt="" style="width: 100%">
</div>
@endif
<div class="row">
	<div class="col-sm-3 pad-10">
		<span class="title">Ngày tạo:</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="data">{{$ticket->created_at}}</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="title">Ngày hết hạn:</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="data-deadline">{{substr( $ticket->deadline,  0, 10 )}}</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="title">Mức độ ưu tiên:</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="data-priority">
			@if($ticket->priority == 1)
			{{'Thấp'}}
			@endif
			@if($ticket->priority == 2)
			{{'Bình thường'}}
			@endif
			@if($ticket->priority == 3)
			{{'Cao'}}
			@endif
			@if($ticket->priority == 4)
			{{'Khẩn cấp'}}
			@endif
		</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="title">Người yêu cầu:</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="data">{{$ticket->ticketCreateBy[0]->name}}</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="title">Người thực hiện:</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="data-assign">{{$ticket->ticketAssignedTo[0]->name}}</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="title">Bộ phận IT:</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class='data-teamid'>
			@if($ticket->team_id == 1)
			{{'Hanoi - IT'}}
			@endif
			@if($ticket->team_id == 2)
			{{'Danang - IT'}}
			@endif
		</span>
	</div>
	
	<div class="col-sm-3 pad-10">
		<span class="title">Trạng thái:</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="data-status">
			@if($ticket->status == 1)
			{{'New'}}
			@endif
			@if($ticket->status == 2)
			{{'Inprogress'}}
			@endif
			@if($ticket->status == 3)
			{{'Resolved'}}
			@endif
			@if($ticket->status == 4)
			{{'Feedback'}}
			@endif
			@if($ticket->status == 5)
			{{'Close'}}
			@endif
			@if($ticket->status == 6)
			{{'Cancelled'}}
			@endif
		</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="title">Người liên quan:</span>
	</div>
	<div class="col-sm-3 pad-10">
		<span class="data-relater">
			@if(isset($relaters))
			@foreach($relaters as $rl)
			{{$rl->employee->name}}{{','}}

			@endforeach
			@endif
		</span>
	</div>
</div>

<a href="http://localhost/web/public/user/edit/{{$ticket->id}}">Xem chi tiết</a>