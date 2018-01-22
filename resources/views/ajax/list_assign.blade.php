
		@foreach($employees as $e)
		<option value="{{$e->id}}" 
			@if($ticket->assigned_to == $e->id)
			{{' selected '}}
			@endif
			>{{ $e->name }}
		</option>
		@endforeach
	