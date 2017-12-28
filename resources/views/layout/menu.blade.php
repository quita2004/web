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
							<li class="@if(isset($site)) @if($site == 11) {{'mark-site'}} @endif @endif"><a href="user/myticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All</a></li>

							<li class="@if(isset($site)) @if($site == 12) {{'mark-site'}} @endif @endif"><a href="user/myticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New</a></li>

							<li class="@if(isset($site)) @if($site == 13) {{'mark-site'}} @endif @endif"><a href="user/myticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress</a></li>

							<li class="@if(isset($site)) @if($site == 14) {{'mark-site'}} @endif @endif"><a href="user/myticket/resolved" class="list-group-item"><i class="fa fa-registered" aria-hidden="true"></i>Resolved</a></li>

							<li class="@if(isset($site)) @if($site == 15) {{'mark-site'}} @endif @endif"><a href="user/myticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date</a></li>
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
							<li class="@if(isset($site)) @if($site == 21) {{'mark-site'}} @endif @endif"><a href="user/reticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All<span class="label label-primary pull-right">@if(readRelaterTicket(0) > 0) {{readRelaterTicket(0)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 22) {{'mark-site'}} @endif @endif"><a href="user/reticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New <span class="label label-success pull-right">@if(readRelaterTicket(1) > 0) {{readRelaterTicket(1)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 23) {{'mark-site'}} @endif @endif"><a href="user/reticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress<span class="label label-info pull-right">@if(readRelaterTicket(2) > 0) {{readRelaterTicket(2)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 24) {{'mark-site'}} @endif @endif"><a href="user/reticket/resolvedso" class="list-group-item"><i class="fa fa-registered" aria-hidden="true"></i>Resolved<span class="label label-warning pull-right">@if(readRelaterTicket(3) > 0) {{readRelaterTicket(3)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 25) {{'mark-site'}} @endif @endif"><a href="user/reticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date<span class="label label-danger pull-right">@if(readRelaterTicket(4) > 0) {{readRelaterTicket(4)}} @endif</span></a></li>
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
							<li class="@if(isset($site)) @if($site == 31) {{'mark-site'}} @endif @endif"><a href="user/assignticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All<span class="label label-primary pull-right">@if(readAssingTicket(0) > 0) {{readAssingTicket(0)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 32) {{'mark-site'}} @endif @endif"><a href="user/assignticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New<span class="label label-success pull-right">@if(readAssingTicket(1) > 0) {{readAssingTicket(1)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 33) {{'mark-site'}} @endif @endif"><a href="user/assignticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress<span class="label label-info pull-right">@if(readAssingTicket(2) > 0) {{readAssingTicket(2)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 34) {{'mark-site'}} @endif @endif"><a href="user/assignticket/feedback" class="list-group-item"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>FeedBack<span class="label label-warning pull-right">@if(readAssingTicket(4) > 0) {{readAssingTicket(4)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 35) {{'mark-site'}} @endif @endif"><a href="user/assignticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date<span class="label label-danger pull-right">@if(readAssingTicket(5) > 0) {{readAssingTicket(5)}} @endif</span></a></li>
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
							<li class="@if(isset($site)) @if($site == 41) {{'mark-site'}} @endif @endif"><a href="user/teamticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All<span class="label label-primary pull-right">@if(readTeamTicket(0) > 0) {{readTeamTicket(0)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 42) {{'mark-site'}} @endif @endif"><a href="user/teamticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New<span class="label label-success pull-right">@if(readTeamTicket(1) > 0) {{readTeamTicket(1)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 43) {{'mark-site'}} @endif @endif"><a href="user/teamticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress<span class="label label-info pull-right">@if(readTeamTicket(2) > 0) {{readTeamTicket(2)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 44) {{'mark-site'}} @endif @endif"><a href="user/teamticket/feedback" class="list-group-item"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>FeedBack<span class="label label-warning pull-right">@if(readTeamTicket(4) > 0) {{readTeamTicket(4)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 45) {{'mark-site'}} @endif @endif"><a href="user/teamticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date<span class="label label-danger pull-right">@if(readTeamTicket(6) > 0) {{readTeamTicket(6)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 46) {{'mark-site'}} @endif @endif"><a href="user/teamticket/close" class="list-group-item"><i class="fa fa-times-circle" aria-hidden="true"></i>close<span class="label label-default pull-right">@if(readTeamTicket(5) > 0) {{readTeamTicket(5)}} @endif</span></a></li>
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
							<li class="@if(isset($site)) @if($site == 51) {{'mark-site'}} @endif @endif"><a href="user/itticket/all" class="list-group-item"><i class="fa fa-inbox" aria-hidden="true"></i>All<span class="label label-primary pull-right">@if(readItTicket(0) > 0) {{readItTicket(0)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 52) {{'mark-site'}} @endif @endif"><a href="user/itticket/new" class="list-group-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>New<span class="label label-success pull-right">@if(readItTicket(1) > 0) {{readItTicket(1)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 53) {{'mark-site'}} @endif @endif"><a href="user/itticket/inprogress" class="list-group-item"><i class="fa fa-download" aria-hidden="true"></i>Inprogress<span class="label label-info pull-right">@if(readItTicket(2) > 0) {{readItTicket(2)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 54) {{'mark-site'}} @endif @endif"><a href="user/itticket/feedback" class="list-group-item"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>FeedBack<span class="label label-warning pull-right">@if(readItTicket(4) > 0) {{readItTicket(4)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 55) {{'mark-site'}} @endif @endif"><a href="user/itticket/outofdate" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>Out Of Date<span class="label label-danger pull-right">@if(readItTicket(6) > 0) {{readItTicket(6)}} @endif</span></a></li>

							<li class="@if(isset($site)) @if($site == 56) {{'mark-site'}} @endif @endif"><a href="user/itticket/close" class="list-group-item"><i class="fa fa-times-circle" aria-hidden="true"></i>close<span class="label label-default pull-right">@if(readItTicket(5) > 0) {{readItTicket(5)}} @endif</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>