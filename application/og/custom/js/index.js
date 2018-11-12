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
			var assunto 		= $("#assunto").val();
			var og 				= $("#og").val();
			var notas 			= $("#notas").val();
			var regional 		= $("#regional").val();

			if(assunto == "") {
				$("#assunto").closest('.form-group').addClass('has-error');
				$("#assunto").after('<p class="text-danger">Campos assunto não pode ser vazio!</p>');
			} else {
				$("#assunto").closest('.form-group').removeClass('has-error');
				$("#assunto").closest('.form-group').addClass('has-success');				
			}

			if(og == "") {
				$("#og").closest('.form-group').addClass('has-error');
				$("#og").after('<p class="text-danger">Campo og não pode ser vazio!</p>');
			} else {
				$("#og").closest('.form-group').removeClass('has-error');
				$("#og").closest('.form-group').addClass('has-success');				
			}

			if(notas == "") {
				$("#notas").closest('.form-group').addClass('has-error');
				$("#notas").after('<p class="text-danger">Campo notas não pode ser vazio!</p>');
			} else {
				$("#notas").closest('.form-group').removeClass('has-error');
				$("#notas").closest('.form-group').addClass('has-success');				
			}

			if(regional == "") {
				$("#regional").closest('.form-group').addClass('has-error');
				$("#regional").after('<p class="text-danger">Campo regional não pode ser vazio!</p>');
			} else {
				$("#regional").closest('.form-group').removeClass('has-error');
				$("#regional").closest('.form-group').addClass('has-success');				
			}

			if(assunto && og && notas && regional) {
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
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {
				$("#editassunto").val(response.assunto);
				$("#editog").val(response.og);
				$("#editnotas").val(response.notas);
				$("#editregional").val(response.regional);				
				$("#editobs").val(response.obs);
				$("#editcodencerramento").val(response.codencerramento);
				$("#editdtfechamento").val(response.dtfechamento);
				$("#edithrfechamento").val(response.hrfechamento);
				$("#edit_status").val(response._status);	

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editassunto 			= $("#editassunto").val();								
					var edit_status 			= $("#edit_status").val();
					var editcodencerramento 	= $("#editcodencerramento").val();
					var editdtfechamento 		= $("#editdtfechamento").val();
					var edithrfechamento 		= $("#edithrfechamento").val();

					if(editassunto == "") {
						$("#editassunto").closest('.form-group').addClass('has-error');
						$("#editassunto").after('<p class="text-danger">Assunto não pode ser vazio!</p>');
					} else {
						$("#editassunto").closest('.form-group').removeClass('has-error');
						$("#editassunto").closest('.form-group').addClass('has-success');				
					}

					if(editcodencerramento == "") {
						$("#editcodencerramento").closest('.form-group').addClass('has-error');
						$("#editcodencerramento").after('<p class="text-danger">Codigo de encerramento necessario</p>');
					} else {
						$("#editcodencerramento").closest('.form-group').removeClass('has-error');
						$("#editcodencerramento").closest('.form-group').addClass('has-success');				
					}

					if(editdtfechamento == "") {
						$("#editdtfechamento").closest('.form-group').addClass('has-error');
						$("#editdtfechamento").after('<p class="text-danger">Data da resolução necessaria</p>');
					} else {
						$("#editdtfechamento").closest('.form-group').removeClass('has-error');
						$("#editdtfechamento").closest('.form-group').addClass('has-success');				
					}

					if(edithrfechamento == "") {
						$("#edithrfechamento").closest('.form-group').addClass('has-error');
						$("#edithrfechamento").after('<p class="text-danger">Hora da resolução necessaria</p>');
					} else {
						$("#edithrfechamento").closest('.form-group').removeClass('has-error');
						$("#edithrfechamento").closest('.form-group').addClass('has-success');				
					}

					if(edit_status == "") {
						$("#edit_status").closest('.form-group').addClass('has-error');
						$("#edit_status").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#edit_status").closest('.form-group').removeClass('has-error');
						$("#edit_status").closest('.form-group').addClass('has-success');				
					}

					if(editassunto && edit_status && editdtfechamento && edithrfechamento) {
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





function viewMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");
		// remove the id
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {
				$("#viewassunto").val(response.assunto);
				$("#viewog").val(response.og);
				$("#viewnotas").val(response.notas);
				$("#viewregional").val(response.regional);	
				$("#viewdtacionamento").val(response.dtacionamento);
				$("#viewhracionamento").val(response.hracionamento);
				$("#viewdataabertura").val(response.dataabertura);
				$("#viewdatafechamento").val(response.datafechamento);					
				$("#viewobs").val(response.obs);
				$("#viewcodencerramento").val(response.codencerramento);
				$("#view_status").val(response._status);	

				// mmeber id 
				$(".viewMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var viewassunto 		= $("#viewassunto").val();
				//	var viewobs 			= $("#viewobs").val();
				//	var viewcodencerramento = $("#viewcodencerramento").val();
					var view_status 		= $("#view_status").val();

				
					if(view_status == "") {
						$("#view_status").closest('.form-group').addClass('has-error');
						$("#view_status").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#view_status").closest('.form-group').removeClass('has-error');
						$("#view_status").closest('.form-group').addClass('has-success');				
					}

					if(view_status) {
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