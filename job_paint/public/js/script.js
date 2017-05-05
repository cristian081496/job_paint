function PaintJobsForm() {

	$('#selectCurrentColor').on('change',function () {
		if($('#selectCurrentColor').val() == "blue"){
			$('#car-current-color').attr('src',$(location).attr('href')+'images/Blue-Car.png');
		}else if($('#selectCurrentColor').val() == "green"){
			$('#car-current-color').attr('src',$(location).attr('href')+'images/Green-Car.png');
		}else if($('#selectCurrentColor').val() == "red"){
			$('#car-current-color').attr('src',$(location).attr('href')+'images/Red-Car.png');
		}else{
			$('#car-current-color').attr('src',$(location).attr('href')+'images/Default-Car.png');
		}
	})

	$('#selectTargetColor').on('change',function () {
		if($('#selectTargetColor').val() == "blue"){
			$('#car-target-color').attr('src',$(location).attr('href')+ 'images/Blue-Car.png');
		}else if($('#selectTargetColor').val() == "green"){
			$('#car-target-color').attr('src',$(location).attr('href')+'images/Green-Car.png');
		}else if($('#selectTargetColor').val() == "red"){
			$('#car-target-color').attr('src',$(location).attr('href')+'images/Red-Car.png');
		}else{
			$('#car-target-color').attr('src',$(location).attr('href')+'images/Default-Car.png');
		}
	})

}

function createNewJobPaint() {
	$('#submitPaintJob').on('click',function () {
		payload = {
				"car_plate_no" : $('#plate_no').val(),
				"current_color" : $('#selectCurrentColor').val(),
				"target_color" : $('#selectTargetColor').val()
		}
		$.jobpaint.executePost('ws/create_new',JSON.stringify(payload)).done(function (data) {
			if(data.status == "SUCCESS"){
				$('#carDetails .message').removeClass('alert-danger');
				$('#carDetails .message').addClass('alert-success');
				$('#carDetails .message').html(data.message);
				$('#carDetails')[0].reset();
				$('#selectTargetColor').trigger('change');
				$('#selectCurrentColor').trigger('change');
			}else{
				$('#carDetails .message').removeClass('alert-success');
				$('#carDetails .message').addClass('alert-danger');
				$('#carDetails .message').html(data.message);

			}
		});
	})
}

function loadAllPaintJobsProgress() {
	
		payload  = {}
		content = "";
		content1 = "";
		$.jobpaint.executePost('ws/allprogress',JSON.stringify(payload)).done(function (data) {
			data.payload.forEach(function (val) {
				content += 	'<tr>' +
						'<td>' + val.car_plate_no +'</td>' +
						'<td>' + val.current_color +'</td>' +
						'<td>' + val.target_color +'</td>' +
						'<td><a href="#" data-id= "' + val.id +'" id="mark_as_completed" class="color-default mark_completed" onclick="return false">Mark as Completed</a></td>' +
					'</tr>';
			})
			$('#content').html(content);
				buttonCompleted();
		});
		setTimeout(function () {
			$.jobpaint.executePost('ws/allqueue',JSON.stringify(payload)).done(function (data) {
				data.payload.forEach(function (val) {
					console.log(val)
					content1 += '<tr>' +
							'<td>' + val.car_plate_no +'</td>' +
							'<td>' + val.current_color +'</td>' +
							'<td>' + val.target_color +'</td>' +
						'</tr>';
				})	
				$('#contentQueue').html(content1);
			
			});
			$.jobpaint.executePost('ws/allcarspainted',JSON.stringify(payload)).done(function (data) {
				$('#allTotal').html(data.payload.all);
				$('#allBlue').html(data.payload.blue);
				$('#allRed').html(data.payload.red);
				$('#allGreen').html(data.payload.green);
			});
		},500)

							
}
function buttonCompleted() {
	$('.mark_completed').unbind('click').on('click',function () {
		payload = {
			"status" : "3",
			"id" : $(this).attr('data-id')
		}
		$.jobpaint.executePost('ws/update',JSON.stringify(payload)).done(function (data) {
			loadAllPaintJobsProgress()
		});
	})
}

