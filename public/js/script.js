$(document).ready(function(){
	$('.btn-teamid').prop('disabled', true);
	$('.btn-priority').prop('disabled', true);
	$('.btn-deadline').prop('disabled', true);
	$('.btn-relaters').prop('disabled', true);
	$('.btn-assign').prop('disabled', true);
	$('.btn-status').prop('disabled', true);
	$('.btn-comment').prop('disabled', true);


	var oldteamid = $('#team_id').val();
	var oldpriority = $('#priority').val();
	var olddeadline = $('#date').val();
	var oldrelaters = $('#relaters').val();
	var oldassign = $('.assign1').val();
	var oldstatus = $('#status').val();

	$('.btn-teamid').click(function(){
		oldteamid = $('#team_id').val();
		var oldassign = $('.assign1').val();
	});
	$('.btn-priority').click(function(){
		oldpriority = $('#priority').val();
	});
	$('.btn-deadline').click(function(){
		olddeadline = $('#date').val();
	});
	$('.btn-relaters').click(function(){
		oldrelaters = $('#relaters').val();
	});
	$('.btn-assign').click(function(){
		oldassign = $('#assign').val();
	});
	$('.btn-status').click(function(){
		oldstatus = $('#status').val();
	});

	$('#team_id').change(function(){
		if($('#team_id').val() != oldteamid)
			$('.btn-teamid').prop('disabled', false);
		else{
			$('.btn-teamid').prop('disabled', true);
		}
	});

	$('#priority').change(function(){
		if($('#priority').val() != oldpriority && $('#change_priority').val() != ''){
			$('.btn-priority').prop('disabled', false);
		}
		else{
			$('.btn-priority').prop('disabled', true);
		}
	});
	$('#change_priority').keyup(function(){
		if($('#priority').val() != oldpriority && $('#change_priority').val() != ''){
			$('.btn-priority').prop('disabled', false);
		}
		else{
			$('.btn-priority').prop('disabled', true);
		}
	});

	$('#date').change(function(){
		if($('#date').val() != olddeadline && $('#change_deadline').val() != ''){
			$('.btn-deadline').prop('disabled', false);
		}
		else{
			$('.btn-deadline').prop('disabled', true);
		}
	});
	$('#change_deadline').keyup(function(){
		if($('#date').val() != oldpriority && $('#change_deadline').val() != ''){
			$('.btn-deadline').prop('disabled', false);
		}
		else{
			$('.btn-deadline').prop('disabled', true);
		}
	});

	$('#relaters').change(function(){
		
		if($('#relaters').val() != oldrelaters){
			$('.btn-relaters').prop('disabled', false);
		}
		else{
			$('.btn-relaters').prop('disabled', true);
		}
	});
	
	$('.assign1').change(function(){
		
		if($('.assign1').val() != oldassign)
			$('.btn-assign').prop('disabled', false);
		else{
			$('.btn-assign').prop('disabled', true);
		}
	});

	$('.status1').change(function(){
		
		if($('.status1').val() != oldstatus && $('.status1').val() != 5){
			$('.btn-status').prop('disabled', false);
			$('.block-rate').hide();
		} else if($('.status1').val() == 5){
			//thay đổi trạng thái sang close
			$('.btn-status').prop('disabled', true);
			$('.block-rate').show();
			var checkbox = $('.close-rate');
			$('input[name=close-rate]').change(function(){
				
				if (checkbox[1].checked === true){
					$('.block-rate .comment-rate').show();
					if($('#unsatisfied').val() == ''){
						$('.btn-status').prop('disabled', true);
						// alert('a');
					}
					$('#unsatisfied').keyup(function(){
						if($('#unsatisfied').val() != ''){
							$('.btn-status').prop('disabled', false);
						} else{
							$('.btn-status').prop('disabled', true);
						}
						
					});
				} else{
					$('.block-rate .comment-rate').hide();
				}
				if(checkbox[0].checked === true){
					$('.btn-status').prop('disabled', false);
				}
			});

			if (checkbox[0].checked === true){
				$('.btn-status').prop('disabled', false);
			}
		} else{
			$('.btn-status').prop('disabled', true);
			$('.block-rate').hide();
		}
	});

	$('#inp-comment').keyup(function(){
		if($('#inp-comment').val() != '')
			$('.btn-comment').prop('disabled', false);
		else{
			$('.btn-comment').prop('disabled', true);
		}
	});

	
	//lazyload trang create
	$('.lazyload').hide();
	// $('.btn-create')

});