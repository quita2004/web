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