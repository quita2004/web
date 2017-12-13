@extends("layout.index")

@section("content")

<div class="col-sm-9 ">
	<div class="content-right edit-request">
		<div class=" content-right-top">
			<div class="content-top-header">
				<div class="row">
					<input type="hidden" name="" id="idticket" value="{{$ticket->id}}">
					@if(session('thongbao'))
					<div class="alert alert-success">
						{{session('thongbao')}}
					</div>
					@endif
					<div class="col-sm-4">
						<h3 class="title"><i class="fa fa-pencil" aria-hidden="true"></i> Công việc chi tiết</h3>
						{{$ticket->subject}}
					</div>

					@if($positionChange['edit'])
					<div class="col-sm-8 content-right-btn">

						@if($positionChange['team'] == 1)
						<button class="btn btn-default" data-toggle="modal" data-target="#modal-it"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Thay đổi bộ phận IT</button>

						<!-- Modal -->
						<div class="modal fade" id="modal-it" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Thay đổi bộ phận IT</h4>
									</div>
									<form action="#" method="POST">
										<div class="modal-body">

											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<div>
												<label class="control-label" for="team_id">Bộ phận IT</label>  
												<select class="form-control" id="team_id" name="team_id">
													<option {{ $ticket->team_id == 1 ? ' selected' : '' }} value="1">Hanoi-IT</option>
													<option {{ $ticket->team_id == 2 ? ' selected' : '' }} value="2">Danang-IT</option>
												</select>
											</div>
											
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary btn-teamid" id="abc" data-dismiss="modal">Thay đổi</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
										</div>
									</form>
								</div>

							</div>
						</div>
						@endif

						@if($positionChange['priority'] == 1)
						<button class="btn btn-default" data-toggle="modal" data-target="#modal-ut"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Thay đổi mức độ ưu tiên</button>
						<!-- Modal -->
						<div class="modal fade" id="modal-ut" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Thay đổi mức độ ưu tiên</h4>
									</div>
									<form action="user/edit/{{$ticket->id}}/priority" method="POST">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<div class="modal-body">
											<div>
												<label class="control-label" for="priority">Mức độ ưu tiên</label>  
												<select class="form-control" id="priority" name="priority">
													<option {{ $ticket->priority == 2 ? ' selected' : '' }} value="2">Bình thường</option>
													<option {{ $ticket->priority == 4 ? ' selected' : '' }} value="4">Khẩn cấp</option>
													<option {{ $ticket->priority == 3 ? ' selected' : '' }} value="3">Cao</option>
													<option {{ $ticket->priority == 1 ? ' selected' : '' }} value="1">Thấp</option>
												</select>
											</div>
											<br>
											<div>
												<label class="control-label" for="change_priority">Lý do thay đổi <span class="important">*</span></label>  
												<input id="change_priority"  type="text" placeholder="Lý do thay đổi" class="form-control"  name="change_priority" required >
											</div>

										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary btn-priority" >Thay đổi</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
										</div>
									</form>
								</div>

							</div>
						</div>
						@endif

						@if($positionChange['deadline'] == 1)
						<button class="btn btn-default" data-toggle="modal" data-target="#modal-dl"><i class="fa fa-calendar-o" aria-hidden="true"></i> Thay đổi deadline</button>
						<!-- Modal -->
						<div class="modal fade" id="modal-dl" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Thay đổi deadline</h4>
									</div>
									<form action="user/edit/{{$ticket->id}}/deadline" method="POST">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<div class="modal-body">
											<div>
												<label class="control-label" for="date">Ngày hết hạn <span class="important">*</span></label>
												<input class="form-control" type="date" id="date" name="date" value="{{substr( $ticket->deadline,  0, 10 )}}" required>
											</div>
											<br>
											<div>
												<label class="control-label" for="change_deadline">Lý do thay đổi <span class="important">*</span></label>  
												<input id="change_deadline" name="change_deadline"  type="text" placeholder="Lý do thay đổi" class="form-control" required>
											</div>

										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary btn-deadline" >Thay đổi</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
										</div>
									</form>
								</div>

							</div>
						</div>
						@endif

						@if($positionChange['relater'] == 1)
						<button class="btn btn-default" data-toggle="modal" data-target="#modal-lq"><i class="fa fa-user" aria-hidden="true"></i> Thay đổi người liên quan</button>
						<!-- Modal -->
						<div class="modal fade" id="modal-lq" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Thay đổi người liên quan</h4>
									</div>
									<form action="user/edit/{{$ticket->id}}/relaters" method="POST">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<div class="modal-body">
											<div>
												<label class="control-label" for="relater">Người liên quan</label>  <br>
												<select id="relaters" data-placeholder="Người liên quan" class="form-control " multiple="multiple" name="relaters[]" style="width: 100%" >
													@foreach($employees as $e)
													<option 
													@foreach($relaters as $rl)
													@if($e->id == $rl->employee_id)
													{{' selected '}}
													@endif
													@endforeach
													value="{{$e->id}}"
													>{{ $e->name }}</option>
													@endforeach
												</select>
											</div>
											<br>

										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary btn-relaters" >Thay đổi</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
										</div>
									</form>
								</div>

							</div>
						</div>
						@endif

						@if($positionChange['assign'] == 1)
						<button class="btn btn-default" data-toggle="modal" data-target="#modal-as"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Asign</button>
						<!-- Modal -->
						<div class="modal fade" id="modal-as" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Thay đổi người thực hiện</h4>
									</div>
									<form action="user/edit/{{$ticket->id}}/assign" method="POST">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<div class="modal-body">
											<div class="change-assign">
												<label class="control-label" for="assign">Người thực hiện</label>  
												<select class="form-control" id="assign" name="assign">
													@foreach($employees as $e)
													<option value="{{$e->id}}" 
														@if($ticket->assigned_to == $e->id)
														{{' selected '}}
														@endif
														>{{ $e->name }}
													</option>
													@endforeach
												</select>
											</div>
											<br>

										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary btn-assign" >Thay đổi</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
										</div>
									</form>
								</div>

							</div>
						</div>
						@endif

						@if($positionChange['status'] == 1)
						<button class="btn btn-default" data-toggle="modal" data-target="#modal-tt"><i class="fa fa-exchange" aria-hidden="true"></i> Thay đổi trạng thái</button>
						<!-- Modal -->
						<div class="modal fade" id="modal-tt" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Thay đổi trạng thái</h4>
									</div>
									<form action="user/edit/{{$ticket->id}}/status" method="POST">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										<div class="modal-body">
											<div>

												<label class="control-label" for="status">Trạng thái</label>  
												<select class="form-control" id="status" name="status">
													<option value="1" 
													@if($ticket->status == 1)
													{{' selected '}}
													@endif

													@if(!in_array(1, $positionStatus))
													{{' hidden '}}
													@endif
													>New</option>

													<option value="2"
													@if($ticket->status == 2)
													{{' selected '}}
													@endif

													@if(!in_array(2, $positionStatus))
													{{' hidden '}}
													@endif
													>Inprogress</option>
													<option value="3"
													@if($ticket->status == 3)
													{{' selected '}}
													@endif

													@if(!in_array(3, $positionStatus))
													{{' hidden '}}
													@endif
													>Resolved</option>
													<option value="4"
													@if($ticket->status == 4)
													{{' selected '}}
													@endif

													@if(!in_array(4, $positionStatus))
													{{' hidden '}}
													@endif
													>Feedback</option>
													<option value="5"
													@if($ticket->status == 5)
													{{' selected '}}
													@endif

													@if(!in_array(5, $positionStatus))
													{{' hidden '}}
													@endif
													>Close</option>
													<option value="6"
													@if($ticket->status == 6)
													{{' selected '}}
													@endif

													@if(!in_array(6, $positionStatus))
													{{' hidden '}}
													@endif
													>Cancelled</option>
												</select>
											</div>
											<br>


										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary btn-status">Thay đổi</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
										</div>
									</form>
								</div>

							</div>
						</div>
						@endif
					</div>
					@endif
				</div>
			</div>
			<hr>
			<div class="content-top-info">
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
						<span class="data">{{$ticket->deadline}}</span>
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
						<span class="title">Mức độ ưu tiên:</span>
					</div>
					<div class="col-sm-3 pad-10">
						<span class="data">
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
						<span class="title">Trạng thái:</span>
					</div>
					<div class="col-sm-3 pad-10">
						<span class="data">
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
						<span class="data">
							@foreach($relaters as $rl)
							{{$rl->employee->name}}{{','}}

							@endforeach

						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="content-right-bottom">
			<h3 class="title"><i class="fa fa-user" aria-hidden="true"></i> Nội dung</h3>
			<br>
			<div>
				{!! $ticket->content !!}
			</div>
			@if($ticket->image)

			<div>
				<img src="upload/{{$ticket->image}}" alt="">
			</div>
			@endif
			<h3 class="title-comment"><i class="fa fa-comments" aria-hidden="true"></i> Bình luận</h3>
			<div class="comment-list">
				@foreach($comment as $cm)
				<div class="comment-detail">
					<div class="user">
						<div class="avata"><img src="img/avata.jpg" alt=""></div>
						<div class="info">
							<a href="#">{{$cm->employee[0]->name}}</a>
							<p class="time-post"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$cm->created_at}}</p>
						</div>
					</div>

					<div class="content-post">
						<p>{{ $cm->note }}</p>
						<p>{{$cm->content}}</p>

					</div>
				</div>
				@endforeach
			</div>

			@if($positionChange['comment'] == 1)
			<h4 class="title-comment">Bình luận</h4>

			<div class=" form-comment">
				<form action="#" method="POST">
					
					<textarea class="form-control " id="inp-comment" name="comment" rows="10" ></textarea>
					<button class="btn btn-primary btn-comment" type="submit">Gửi bình luận</button>
				</form>

			</div>
			@endif

		</div>
	</div>
</div>
@endsection
@section("script")

<script type="text/javascript">
	$(document).ready(function(){
		var idticket = $('#idticket').val();
		$('.btn-teamid').click(function(e){
			e.preventDefault();
			
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				'url' : 'user/edit/'+idticket+'/teamid',
				'data' : 
				{
					'team_id' : $('#team_id').val()
				},
				'type' : 'POST',
				success: function(data){
					$('.data-assign').html(data['assign']);
					$('.data-teamid').html(data['teamid']);
					$('.change-assign').html(data['list_assign']);
					oldteamid = $('#team_id').val();
					alert(oldteamid);
				}
			}

			);
		});

		$('.btn-comment').click(function(e){
			e.preventDefault();
			
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				'url' : 'user/edit/'+idticket+'/comment',
				'data' : 
				{
					'comment' : $('#inp-comment').val()
				},
				'type' : 'POST',
				success: function(data){
					$('.comment-list').html(data);
					$('#inp-comment').val('');
				}
			}

			);
		});
	});
</script>

<script type="text/javascript">

	$(document).ready(function(){
		$('.btn-teamid').prop('disabled', true);
		$('.btn-priority').prop('disabled', true);
		$('.btn-deadline').prop('disabled', true);
		$('.btn-relaters').prop('disabled', true);

		$('.btn-status').prop('disabled', true);
		$('.btn-comment').prop('disabled', true);
		

		var oldteamid = $('#team_id').val();
		var oldpriority = $('#priority').val();
		var olddeadline = $('#date').val();
		var oldrelaters = $('#relaters').val();
		var oldassign = $('#assign').val();
		var oldstatus = $('#status').val();


		$('#team_id').change(function(){
			if($('#team_id').val() != oldteamid)
				$('.btn-teamid').prop('disabled', false);
			else{
				$('.btn-teamid').prop('disabled', true);
			}
		});

		$('#priority').change(function(){
			if($('#priority').val() != oldpriority){
				$('.btn-priority').prop('disabled', false);
			}
			else{
				$('.btn-priority').prop('disabled', true);
			}
		});

		$('#date').change(function(){
			if($('#date').val() != olddeadline)
				$('.btn-deadline').prop('disabled', false);
			else{
				$('.btn-deadline').prop('disabled', true);
			}
		});

		$('#relaters').change(function(){
			if($('#relaters').val() != oldrelaters)
				$('.btn-relaters').prop('disabled', false);
			else{
				$('.btn-relaters').prop('disabled', true);
			}
		});

		$('#assign').change(function(){

			if($('#assign').val() != oldassign)
				$('.btn-assign').prop('disabled', false);
			else{
				$('.btn-assign').prop('disabled', true);
			}
		});

		$('#status').change(function(){
			if($('#status').val() != oldstatus)
				$('.btn-status').prop('disabled', false);
			else{
				$('.btn-status').prop('disabled', true);
			}
		});
		$('#inp-comment').keyup(function(){
			if($('#inp-comment').val() != '')
				$('.btn-comment').prop('disabled', false);
			else{
				$('.btn-comment').prop('disabled', true);
			}
		});
		
	});
</script>

<script type="text/javascript">

	$("#relaters").select2({
		theme:"bootstrap"
	});


</script>



@endsection