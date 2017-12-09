<div class="col-sm-3 ">
	<div class="content-left">
		<div class="add-request">
			<a href="user/create" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Thêm yêu cầu</a>
		</div>
		<div class="myrequest">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Việc tôi yêu cầu
							<span class="panel-title">
								<a data-toggle="collapse" href="#myrequest" class=""><i class="fa" aria-hidden="true"></i> </a>
							</span>
						</h4>

					</div>
					<div id="myrequest" class="panel-collapse collapse in">
						<ul class="list-group">
							<li><a href="user/myticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All<span class="label label-primary pull-right"></span><span class=""></span></a></li>
							<li><a href="user/myticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New<span class="label label-success pull-right"></span></a></li>
							<li><a href="user/myticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress<span class="label label-info pull-right"></span></a></li>
							<li><a href="user/myticket/resolved" class="list-group-item"><i class="fa fa-registered" aria-hidden="true"></i>Resolved<span class="label label-warning pull-right"></span></a></li>
							<li><a href="user/myticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date<span class="label label-danger pull-right"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="work">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Công việc liên quan
							<span class="panel-title">
								<a data-toggle="collapse" href="#work"  class=""><i class="fa" aria-hidden="true"></i>  </a>
							</span>
						</h4>
					</div>
					<div id="work" class="panel-collapse collapse in ">
						<ul class="list-group">
							<li><a href="user/reticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All</a></li>
							<li><a href="user/reticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New</a></li>
							<li><a href="user/reticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress</a></li>
							<li><a href="user/reticket/resolvedso" class="list-group-item"><i class="fa fa-registered" aria-hidden="true"></i>Resolved</a></li>
							<li><a href="user/reticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="assign">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Công việc tôi được giao
							<span class="panel-title">
								<a data-toggle="collapse" href="#assign"  class=""><i class="fa" aria-hidden="true"></i>  </a>
							</span>
						</h4>
					</div>
					<div id="assign" class="panel-collapse collapse in ">
						<ul class="list-group">
							<li><a href="user/assignticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All</a></li>
							<li><a href="user/assignticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New</a></li>
							<li><a href="user/assignticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress</a></li>
							<li><a href="user/assignticket/feedback" class="list-group-item"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>FeedBack</a></li>
							<li><a href="user/assignticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		@if(isViewTeam())
		<div class="team">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Công việc của team
							<span class="panel-title">
								<a data-toggle="collapse" href="#team"  class=""><i class="fa" aria-hidden="true"></i>  </a>
							</span>
						</h4>
					</div>
					<div id="team" class="panel-collapse collapse in">
						<ul class="list-group">
							<li><a href="user/teamticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All</a></li>
							<li><a href="user/teamticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New</a></li>
							<li><a href="user/teamticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress</a></li>
							<li><a href="user/teamticket/feedback" class="list-group-item"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>FeedBack</a></li>
							<li><a href="user/teamticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date</a></li>
							<li><a href="user/teamticket/close" class="list-group-item"><i class="fa fa-times-circle" aria-hidden="true"></i>close</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		@endif

		@if(isViewIt())
		<div class="it">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Công việc của bộ phận IT
							<span class="panel-title">
								<a data-toggle="collapse" href="#it"  class=""><i class="fa" aria-hidden="true"></i>  </a>
							</span>
						</h4>
					</div>
					<div id="it" class="panel-collapse collapse in">
						<ul class="list-group">
							<li><a href="user/itticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All</a></li>
							<li><a href="user/itticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New</a></li>
							<li><a href="user/itticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress</a></li>
							<li><a href="user/itticket/feedback" class="list-group-item"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>FeedBack</a></li>
							<li><a href="user/itticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date</a></li>
							<li><a href="user/itticket/close" class="list-group-item"><i class="fa fa-times-circle" aria-hidden="true"></i>close</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>