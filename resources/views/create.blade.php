@extends("layout.index")

@section("content")
<div class="col-sm-9 ">
	<div class="content-right creat-request">
		<h3>Thêm yêu cầu</h3>
		<hr>
		<div class="row">
			@if(count($errors) > 0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $er)
				{{$er}}<br/>
				@endforeach
			</div>
			@endif
			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif
			<form action="user/create" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<div class="col-sm-12 form-group">
						<label class="control-label" for="name">Tên công việc <span class="important">*</span></label> 
						<input id="name"  type="text" placeholder="Tên công việc" class="form-control" name="name" value="{{old('name')}}">
					</div>
					<div class="col-sm-6 form-group">
						<label class="control-label" for="uutien">Mức độ ưu tiên</label>  
						<select class="form-control" id="uutien" name="uutien">
							<option {{ old('uutien') == 2 ? ' selected' : '' }} value="1">Bình thường</option>
							<option {{ old('uutien') == 4 ? ' selected' : '' }} value="4">Khẩn cấp</option>
							<option {{ old('uutien') == 3 ? ' selected' : '' }} value="3">Cao</option>
							<option {{ old('uutien') == 1 ? ' selected' : '' }} value="2">Thấp</option>
						</select>
					</div>
					<div class="col-sm-6 form-group">
						<label class="control-label" for="date">Ngày hết hạn <span class="important">*</span></label>
						<input class="form-control" type="date" id="date" name="date" value="{{old('date')}}" >
					</div>
					<div class="col-sm-6 form-group">
						<label class="control-label" for="team_id">Bộ phận IT</label>  
						<select class="form-control" id="team_id" name="team_id">
							<option {{ old('team_id') == 1 ? ' selected' : '' }} value="1">Hanoi-IT</option>
							<option {{ old('team_id') == 2 ? ' selected' : '' }} value="2">Danang-IT</option>
						</select>
					</div>
					<div class="col-sm-6 ">
						<label class="control-label" for="relater">Người liên quan</label>  
						<select id="relater" data-placeholder="Người liên quan" class="form-control" multiple="multiple" name="relaters[]" >
							@foreach($employees as $e)
							<option {{ (collect(old('relaters'))->contains($e->id)) ? 'selected':'' }} value="{{ $e->id }}">{{ $e->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-12 form-group">
						<label class="control-label" for="demo">Nội dung <span class="important">*</span></label>  
						<textarea class="form-control " name="content" id="" rows="10" ></textarea>
					</div>
					<div class="col-sm-12 form-group">
						<input class="form-control-file" accept="image/png, image/jpeg, image/gif" type="file" name="hinh">
					</div>
					<div class="col-sm-12 form-group">
						<button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Gửi yêu cầu</button>
						<button class="btn btn-default"><i class="fa fa-ban" aria-hidden="true"></i> Huỷ bỏ</button>
					</div>
				</div>
			</form>
			
		</div>
	</div>
</div>
@endsection

@section("script")
<script type="text/javascript">
	
$("#relater").select2({
	theme:"bootstrap"
});


</script>
@endsection

