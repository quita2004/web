@extends("layout.index")

@section("content")

<div class="col-sm-9 ">
	<div class="content-right sitemap">
		<div class="row">
			<h1>Sitemap</h1>
			<div class="col-sm-6">
				<a href="user/create"><i class="fa fa-angle-right" aria-hidden="true"></i> Tạo yêu cầu</a>
				<br>
				<br>
				<h4>Danh sách công việc tôi yêu cầu</h4>
				<a href="user/myticket/all"><i class="fa fa-angle-right" aria-hidden="true"></i> All</a>
				<br>
				<a href="user/myticket/new"><i class="fa fa-angle-right" aria-hidden="true"></i> New</a>
				<br>
				<a href="user/myticket/inprogress"><i class="fa fa-angle-right" aria-hidden="true"></i> Inprogress</a>
				<br>
				<a href="user/myticket/resolved"><i class="fa fa-angle-right" aria-hidden="true"></i> Resolved</a>
				<br>
				<a href="user/myticket/outofdate"><i class="fa fa-angle-right" aria-hidden="true"></i> Out Of Date</a>
				<h4>Danh sách công việc liên quan</h4>
				<a href="user/reticket/all"><i class="fa fa-angle-right" aria-hidden="true"></i> All</a>
				<br>
				<a href="user/reticket/new"><i class="fa fa-angle-right" aria-hidden="true"></i> New</a>
				<br>
				<a href="user/reticket/inprogress"><i class="fa fa-angle-right" aria-hidden="true"></i> Inprogress</a>
				<br>
				<a href="user/reticket/resolvedso"><i class="fa fa-angle-right" aria-hidden="true"></i> Resolved</a>
				<br>
				<a href="user/reticket/outofdate"><i class="fa fa-angle-right" aria-hidden="true"></i> Out Of Date</a>
				<h4>Danh sách công việc được giao</h4>
				<a href="user/assignticket/all"><i class="fa fa-angle-right" aria-hidden="true"></i> All</a>
				<br>
				<a href="user/assignticket/new"><i class="fa fa-angle-right" aria-hidden="true"></i> New</a>
				<br>
				<a href="user/assignticket/inprogress"><i class="fa fa-angle-right" aria-hidden="true"></i> Inprogress</a>
				<br>
				<a href="user/assignticket/feedback"><i class="fa fa-angle-right" aria-hidden="true"></i> FeedBack</a>
				<br>
				<a href="user/assignticket/outofdate"><i class="fa fa-angle-right" aria-hidden="true"></i> Out Of Date</a>
			</div>
			<div class="col-sm-6">
				<a href="sitemap#"><i class="fa fa-angle-right" aria-hidden="true"></i> Xem chi tiết và sửa yêu cầu</a>
				<br>
				<br>
				<h4>Danh sách công việc của team</h4>
				<a href="user/teamticket/all"><i class="fa fa-angle-right" aria-hidden="true"></i> All</a>
				<br>
				<a href="user/teamticket/new"><i class="fa fa-angle-right" aria-hidden="true"></i> New</a>
				<br>
				<a href="user/teamticket/inprogress"><i class="fa fa-angle-right" aria-hidden="true"></i> Inprogress</a>
				<br>
				<a href="user/teamticket/feedback"><i class="fa fa-angle-right" aria-hidden="true"></i> FeedBack</a>
				<br>
				<a href="user/teamticket/outofdate"><i class="fa fa-angle-right" aria-hidden="true"></i> Out Of Date</a>
				<br>
				<a href="user/teamticket/close"><i class="fa fa-angle-right" aria-hidden="true"></i> Close</a>
				<h4>Danh sách công việc của bộ phận IT</h4>
				<a href="user/itticket/all"><i class="fa fa-angle-right" aria-hidden="true"></i> All</a>
				<br>
				<a href="user/itticket/new"><i class="fa fa-angle-right" aria-hidden="true"></i> New</a>
				<br>
				<a href="user/itticket/inprogress"><i class="fa fa-angle-right" aria-hidden="true"></i> Inprogress</a>
				<br>
				<a href="user/itticket/feedback"><i class="fa fa-angle-right" aria-hidden="true"></i> FeedBack</a>
				<br>
				<a href="user/itticket/outofdate"><i class="fa fa-angle-right" aria-hidden="true"></i> Out Of Date</a>
				<br>
				<a href="user/itticket/close"><i class="fa fa-angle-right" aria-hidden="true"></i> Close</a>
			</div>
		</div>
		
	</div>
</div>
@endsection
@section("script")

@endsection