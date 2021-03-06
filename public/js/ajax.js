// edit ticket
$(document).ready(function(){
	var idticket = $('#idticket').val();

	$('.btn-teamid').click(function(e){
		e.preventDefault();
		$('.lazyload').show();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			'url' : 'user/edit/'+idticket+'/teamid',
			'data' : 
			{
				'team_id' : $('#team_id').val()
			},
			'type' : 'POST',
			success: function(data){
				$('.lazyload').hide();
				$('.data-assign').html(data['assign']);
				$('.data-teamid').html(data['teamid']);
				$('select.assign1').html(data['list_assign']);
				

				var positionChange = data['positionChange'];
				
				$.each(positionChange, function(key, value) {

					if(value == 0){
						
						$('.'+key).hide();
					} else if(value == 1){
						$('.'+key).show();
					}
				});

				$('.btn-teamid').prop('disabled', true);

				$.notify(data['thongbao'], "success");
			}
		}

		);
	});

	$('.btn-priority').click(function(e){
		e.preventDefault();
		$('.lazyload').show();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			'url' : 'user/edit/'+idticket+'/priority',
			'data' : 
			{
				'priority' : $('#priority').val(),
				'change_priority': $('#change_priority').val()
			},
			'type' : 'POST',
			success: function(data){
				$('.lazyload').hide();
				$('.comment-list').append(data['newcomment']);
				$('#change_priority').val('');
				$(".data-priority").html(data['priority']);
				$('#priority option[selected]').attr('selected', false);
				$('#priority option[value=' + data['valp'] + ']').attr('selected', true);

				$('.btn-priority').prop('disabled', true);

				$.notify(data['thongbao'], "success");
			}
		}

		);
	});

	$('.btn-deadline').click(function(e){
		e.preventDefault();
		$('.lazyload').show();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			'url' : 'user/edit/'+idticket+'/deadline',
			'data' : 
			{
				'date' : $('#date').val(),
				'change_deadline': $('#change_deadline').val()
			},
			'type' : 'POST',
			success: function(data){
				$('.lazyload').hide();
				$('.comment-list').append(data['newcomment']);
				$('#change_deadline').val('');
				$(".data-deadline").html(data['newdeadline']);
				$('#date').val(data['newdeadline']);

				$('.btn-deadline').prop('disabled', true);

				$.notify(data['thongbao'], "success");
			}
		}

		);
	});

	$('.btn-relaters').click(function(e){
		e.preventDefault();
		$('.lazyload').show();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			'url' : 'user/edit/'+idticket+'/relaters',
			'data' : 
			{
				'relaters' : $('#relaters').val()
			},
			'type' : 'POST',
			success: function(data){
				$('.lazyload').hide();
				$('.data-relater').html(data['newrelater']);
				

				$('.btn-relaters').prop('disabled', true);

				$.notify(data['thongbao'], "success");
			}
		}

		);
	});

	$('.btn-assign').click(function(e){
		e.preventDefault();
		$('.lazyload').show();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			'url' : 'user/edit/'+idticket+'/assign',
			'data' : 
			{
				'assign' : $('.assign1').val()
			},
			'type' : 'POST',
			success: function(data){
				$('.lazyload').hide();
				$('.data-assign').html(data['assign']);
				

				$('.btn-assign').prop('disabled', true);

				$.notify(data['thongbao'], "success");
			}
		}

		);
	});

	$('.btn-status').click(function(e){
		e.preventDefault();
		$('.lazyload').show();
		var checkbox = $('.close-rate');
		for (var i = 0; i < checkbox.length; i++){
			if (checkbox[i].checked === true){
				var rate = checkbox[i].value;
			}
		}
		var unsatisfied = $('#unsatisfied').val();
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			'url' : 'user/edit/'+idticket+'/status',
			'data' : 
			{
				'status' : $('#status').val(),
				'rate' : rate,
				'unsatisfied' : unsatisfied
			},
			'type' : 'POST',
			success: function(data){
				$('.lazyload').hide();
				// $('.block-status').html(data['block-status']);
				$('.data-status').html(data['status']);
				$('.comment-list').append(data['newcomment']);
				
				var positionChange = data['positionChange'];
				
				$.each(positionChange, function(key, value) {
					if(value == 0){
						$('.'+key).hide();
					} else if(value == 1){
						$('.'+key).show();
					}
				});

				var positionStatus = data['positionStatus'];
				console.log(positionStatus);
				for (var i =1; i < 7; i++){
					if(positionStatus.indexOf(i) < 0){
						console.log('them '+i);
						$('#status option[value='+i+']').attr('hidden', true);
					} else{
						console.log('xoa '+i);
						$('#status option[value='+i+']').attr('hidden', false);
					}
				}

				$.notify(data['thongbao'], "success");
				
			}
		}

		);
	});

	$('.btn-comment').click(function(e){
		e.preventDefault();
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			'url' : 'user/edit/'+idticket+'/comment',
			'data' : 
			{
				'comment' : $('#inp-comment').val()
			},
			'type' : 'POST',
			success: function(data){
				
				$('.comment-list').append(data);
				$('#inp-comment').val('');
				$('.btn-comment').prop('disabled', true);
			}
		});
	});

	

});


// mark read
$(document).ready(function(){
	var site = $('#site').val();
	// console.log(site);
	$('.checkbox-read').click(function(){
		var idticket = this.name;
		
		$('.lazyload.'+idticket).show();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			'url' : 'user/AjaxMarkRead/'+idticket,
			'data' : 
			{
				'ischeck' : this.checked,
				'site' : site
			},
			'type' : 'POST',
			success: function(data){
				$('.lazyload').hide();
				$('.menu').html(data);
				if($('#'+idticket).hasClass('chua-xem')){
					$('#'+idticket).removeClass('chua-xem');
				} else{
					$('#'+idticket).addClass('chua-xem');
				}
			}
		});
	});
});