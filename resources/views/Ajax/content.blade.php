<div class="col-sm-9 ">
	<div class="content-right edit-request">
		<div class=" content-right-top">
			<div class="content-top-header">
				<div class="row">
					<input type="hidden" name="" id="idticket" value="{{$ticket->id}}">
					
					<div class=" thongbao"></div>
					
					<div class="col-sm-4">
						<h3 class="title"><i class="fa fa-pencil" aria-hidden="true"></i> Công việc chi tiết</h3>
						<br>
						{{$ticket->subject}}
					</div>

					@if($positionChange['edit'] == 1)
					<div class="col-sm-8 content-right-btn">

						@if($positionChange['team'] == 1)
						<div class="changeteam block-change">
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
						</div>
						@endif

						@if($positionChange['priority'] == 1)
						<div class="changepriority block-change">
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
										<form action="#" method="POST">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<div class="modal-body">
												<div>
													<label class="control-label" for="priority">Mức độ ưu tiên <span class="important">*</span> </label>  
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
												<button type="submit" class="btn btn-primary btn-priority" data-dismiss="modal">Thay đổi</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
						@endif

						@if($positionChange['deadline'] == 1)
						<div class="changedeadline block-change">
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
												<button type="submit" class="btn btn-primary btn-deadline"  data-dismiss="modal">Thay đổi</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
						@endif

						@if($positionChange['relater'] == 1)
						<div class="changerelater block-change">
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
												<div class="block-relater">
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
												<button type="submit" class="btn btn-primary btn-relaters" data-dismiss="modal">Thay đổi</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
						@endif

						@if($positionChange['assign'] == 1)
						<div class="changeassign block-change">
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
													<select class="form-control assign1" id="assign" name="assign" >
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
												<button type="submit" class="btn btn-primary btn-assign" data-dismiss="modal">Thay đổi</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
						@endif

						@if($positionChange['status'] == 1)
						<div class="changestatus block-change">
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
												<div class="block-status">

													<label class="control-label" for="status">Trạng thái</label>  
													<select class="form-control status1" id="status" name="status">
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
												<button type="submit" class="btn btn-primary btn-status" data-dismiss="modal">Thay đổi</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
											</div>
										</form>
									</div>

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
						<span class="data-deadline">{{substr( $ticket->deadline,  0, 10 )}}</span>
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
			<br>
			<div>
				<img src="upload/{{$ticket->image}}" alt="" style="width: 100%">
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
			<div class="changecomment">
				<h4 class="title-comment">Bình luận <span class="important">*</span> </h4>

				<div class=" form-comment">
					<form action="#" method="POST">

						<textarea class="form-control " id="inp-comment" name="comment" rows="10" ></textarea>
						<button class="btn btn-primary btn-comment" type="submit">Gửi bình luận</button>
					</form>

				</div>
			</div>
			@endif

		</div>
	</div>
</div>