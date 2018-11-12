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
			var nom_usuario 	= $("#nom_usuario").val();
			var login 			= $("#login").val();
			var pwd_usuario 	= $("#pwd_usuario").val();
			var nivel 			= $("#nivel").val();
			var ds_status 		= $("#ds_status").val();

			if(nom_usuario == "") {
				$("#nom_usuario").closest('.form-group').addClass('has-error');
				$("#nom_usuario").after('<p class="text-danger">Nome necessario</p>');
			} else {
				$("#nom_usuario").closest('.form-group').removeClass('has-error');
				$("#nom_usuario").closest('.form-group').addClass('has-success');				
			}

			if(login == "") {
				$("#login").closest('.form-group').addClass('has-error');
				$("#login").after('<p class="text-danger">Login necessario</p>');
			} else {
				$("#login").closest('.form-group').removeClass('has-error');
				$("#login").closest('.form-group').addClass('has-success');				
			}

			if(pwd_usuario == "") {
				$("#pwd_usuario").closest('.form-group').addClass('has-error');
				$("#pwd_usuario").after('<p class="text-danger">senha necessaria</p>');
			} else {
				$("#pwd_usuario").closest('.form-group').removeClass('has-error');
				$("#pwd_usuario").closest('.form-group').addClass('has-success');				
			}

			if(nivel == "") {
				$("#nivel").closest('.form-group').addClass('has-error');
				$("#nivel").after('<p class="text-danger">Nivel necessario</p>');
			} else {
				$("#nivel").closest('.form-group').removeClass('has-error');
				$("#nivel").closest('.form-group').addClass('has-success');				
			}

			if(ds_status == "") {
				$("#ds_status").closest('.form-group').addClass('has-error');
				$("#ds_status").after('<p class="text-danger">Status necessario</p>');
			} else {
				$("#ds_status").closest('.form-group').removeClass('has-error');
				$("#ds_status").closest('.form-group').addClass('has-success');				
			}

			if(nom_usuario && login && pwd_usuario &&  nivel  && ds_status) {
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

				$("#editNom_usuario").val(response.nom_usuario);
				$("#editLogin").val(response.login);
				$("#editPwd_usuario").val(response.pwd_usuario);
				$("#editNivel").val(response.Nivel);
				$("#editDs_status").val(response.Ds_status);	

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.cod_usuario+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editNom_usuario 	= $("#editNom_usuario").val();
					var editLogin 			= $("#editLogin").val();
					var editPwd_usuario 	= $("#editPwd_usuario").val();
					var editNivel 			= $("#editNivel").val();
					var editDs_status 		= $("#editDs_status").val();

					if(editNom_usuario == "") {
						$("#editNom_usuario").closest('.form-group').addClass('has-error');
						$("#editNom_usuario").after('<p class="text-danger">The Name field is required</p>');
					} else {
						$("#editNom_usuario").closest('.form-group').removeClass('has-error');
						$("#editNom_usuario").closest('.form-group').addClass('has-success');				
					}

					if(editLogin == "") {
						$("#editLogin").closest('.form-group').addClass('has-error');
						$("#editLogin").after('<p class="text-danger">The Login field is required</p>');
					} else {
						$("#editLogin").closest('.form-group').removeClass('has-error');
						$("#editLogin").closest('.form-group').addClass('has-success');				
					}

					if(editPwd_usuario == "") {
						$("#editPwd_usuario").closest('.form-group').addClass('has-error');
						$("#editPwd_usuario").after('<p class="text-danger">The Pwd_usuario field is required</p>');
					} else {
						$("#editPwd_usuario").closest('.form-group').removeClass('has-error');
						$("#editPwd_usuario").closest('.form-group').addClass('has-success');				
					}

					if(editNivel == "") {
						$("#editNivel").closest('.form-group').addClass('has-error');
						$("#editNivel").after('<p class="text-danger">The Pwd_usuario field is required</p>');
					} else {
						$("#editNivel").closest('.form-group').removeClass('has-error');
						$("#editNivel").closest('.form-group').addClass('has-success');				
					}

					if(editDs_status == "") {
						$("#editDs_status").closest('.form-group').addClass('has-error');
						$("#editDs_status").after('<p class="text-danger">The Ds_status field is required</p>');
					} else {
						$("#editDs_status").closest('.form-group').removeClass('has-error');
						$("#editDs_status").closest('.form-group').addClass('has-success');				
					}

					if(editNom_usuario && editLogin && editPwd_usuario && editNivel && editDs_status) {
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