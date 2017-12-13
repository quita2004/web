@extends("layout.index")

@section("content")
<div class="col-sm-9 ">
	<div class="content-right assign">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="title">Danh sách công việc tôi liên quan <small>{{$page}}</small></h3>
				<table id="table-assign" class="table">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên công việc</th>
							<th>Mức độ ưu tiên</th>
							<th>Người yêu cầu</th>
							<th>Người thực hiện</th>
							<th>Ngày hết hạn</th>
							<th>Trạng thái</th>
						</tr>
					</thead>
					<tbody>
						<?php $stt = 0 ?>
						@foreach($ticket as $tk)
						<tr class="@if(!isRead($tk->id)) {{' chua-xem '}} @endif">
							<td>{{$stt+=1}}</td>
							<td>
								<a href="user/edit/{{$tk->id}}">{{$tk->subject}}</a>
							</td>
							<td>
								@if($tk->priority == 1)
								{{'Thấp'}}
								@endif
								@if($tk->priority == 2)
								{{'Bình thường'}}
								@endif
								@if($tk->priority == 3)
								{{'Cao'}}
								@endif
								@if($tk->priority == 4)
								{{'Khẩn cấp'}}
								@endif
							</td>
							<td>{{$tk->ticketCreateBy[0]->name}}</td>
							<td>{{$tk->ticketAssignedTo[0]->name}}</td>
							<td>{{$tk->deadline}}</td>
							<td>
								@if($tk->status == 1)
								{{'New'}}
								@endif
								@if($tk->status == 2)
								{{'Inprogress'}}
								@endif
								@if($tk->status == 3)
								{{'Resolved'}}
								@endif
								@if($tk->status == 4)
								{{'Feedback'}}
								@endif
								@if($tk->status == 5)
								{{'Close'}}
								@endif
								@if($tk->status == 6)
								{{'Cancelled'}}
								@endif
							</td>

						</tr>
						
						@endforeach
						
						
					</tbody>
				</table>
			</div>
		</div>
		
		


	</div>
</div>
@endsection

@section("script")
<script type="text/javascript">
// tablefilter
var filtersConfig = {
base_path: 'vendor/tablefilter/',
col_0: 'none',
col_2: 'select',
col_6: 'select',
filters_row_index: 1,
sort: true,
btn_reset:true,
btn_reset_html: '<input type="button" value="Reset bộ lọc" class="btn btn-primary table-reset-search" />',
loader: true,
help_instructions: false,
paging: {
length: 5,
results_per_page: ['Hiển thị: ', [5, 10, 15]]
},
rows_counter: true,  
rows_counter_text: "Tổng:",
col_types: [
'number', 'string', 'string',
'string', 'string', 'date',
'string'
],
col_widths: [
'10%', '20%', '15%',
'15%', '15%', '15%',
'10%'
],
extensions:[{ name: 'sort' }]
};

var tf = new TableFilter('table-assign', filtersConfig);
tf.init();

</script>
@endsection