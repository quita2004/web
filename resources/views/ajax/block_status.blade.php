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