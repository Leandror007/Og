// global the manage memeber table 
var manageMemberTable;

$(document).ready(function() {
	manageMemberTable = $("#manageMemberTable").DataTable({
		"ajax": "php_action/retrieve.php",
		"order": []
	});

	$("#addMemberModalBtn").on('click', function() {
		// reset the form 
		$("#createMemberForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createMemberForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var regiao 	        = $("#regiao").val();
			var latitude_x 		= $("#latitude_x").val();
			var longitude_y 	= $("#longitude_y").val();
			var cidade 			= $("#cidade").val();
			

			if(regiao == "") {
				$("#regiao").closest('.form-group').addClass('has-error');
				$("#regiao").after('<p class="text-danger">Região necessaria</p>');
			} else {
				$("#regiao").closest('.form-group').removeClass('has-error');
				$("#regiao").closest('.form-group').addClass('has-success');				
			}

			if(latitude_x == "") {
				$("#latitude_x").closest('.form-group').addClass('has-error');
				$("#latitude_x").after('<p class="text-danger">Latitude x necessario</p>');
			} else {
				$("#latitude_x").closest('.form-group').removeClass('has-error');
				$("#latitude_x").closest('.form-group').addClass('has-success');				
			}

			if(longitude_y == "") {
				$("#longitude_y").closest('.form-group').addClass('has-error');
				$("#longitude_y").after('<p class="text-danger">Longitude y necessaria</p>');
			} else {
				$("#longitude_y").closest('.form-group').removeClass('has-error');
				$("#longitude_y").closest('.form-group').addClass('has-success');				
			}

			if(cidade == "") {
				$("#cidade").closest('.form-group').addClass('has-error');
				$("#cidade").after('<p class="text-danger">Cidade necessaria</p>');
			} else {
				$("#cidade").closest('.form-group').removeClass('has-error');
				$("#cidade").closest('.form-group').addClass('has-success');				
			}

			

			if(regiao && latitude_x && longitude_y &&  cidade) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
								'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
								'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
								'</div>');

							// reset the form
							$("#createMemberForm")[0].reset();		

							// reload the datatables
							manageMemberTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
								'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
								'<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
								'</div>');
						}  // /else
					} // success  
				}); // ajax subit 				
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeMember(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/remove.php',
				type: 'post',
				data: {member_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#removeMemberModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							'<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
} else {
	alert('Error: Refresh the page again');
}
}

function editMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		$(".edit-messages").html("");
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {

				$("#editregiao").val(response.regiao);
				$("#editlatitude_x").val(response.latitude_x);
				$("#editlongitude_y").val(response.longitude_y);
				$("#editcidade").val(response.cidade);
					

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editregiao 			= $("#editregiao").val();
					var editlatitude_x 		= $("#editlatitude_x").val();
					var editlongitude_y 	= $("#editlongitude_y").val();
					var editcidade 			= $("#editcidade").val();
					

					if(editregiao == "") {
						$("#editregiao").closest('.form-group').addClass('has-error');
						$("#editregiao").after('<p class="text-danger">Regional necessaria</p>');
					} else {
						$("#editregiao").closest('.form-group').removeClass('has-error');
						$("#editregiao").closest('.form-group').addClass('has-success');				
					}

					if(editlatitude_x == "") {
						$("#editlatitude_x").closest('.form-group').addClass('has-error');
						$("#editlatitude_x").after('<p class="text-danger">Latitude x necessaria</p>');
					} else {
						$("#editlatitude_x").closest('.form-group').removeClass('has-error');
						$("#editlatitude_x").closest('.form-group').addClass('has-success');				
					}

					if(editlongitude_y == "") {
						$("#editlongitude_y").closest('.form-group').addClass('has-error');
						$("#editlongitude_y").after('<p class="text-danger">Longitude y necessaria</p>');
					} else {
						$("#editlongitude_y").closest('.form-group').removeClass('has-error');
						$("#editlongitude_y").closest('.form-group').addClass('has-success');				
					}

					if(editcidade == "") {
						$("#editcidade").closest('.form-group').addClass('has-error');
						$("#editcidade").after('<p class="text-danger">Cidade necessaria</p>');
					} else {
						$("#editcidade").closest('.form-group').removeClass('has-error');
						$("#editcidade").closest('.form-group').addClass('has-success');				
					}

					

					if(editregiao && editlatitude_x && editlongitude_y && editcidade) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
										'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
										'</div>');

									// reload the datatables
									manageMemberTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
										'<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
										'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

} else {
	alert("Error : Refresh the page again");
}
}