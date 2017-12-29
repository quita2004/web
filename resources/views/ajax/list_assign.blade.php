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