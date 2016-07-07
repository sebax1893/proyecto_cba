
$('.btn-danger').click(function() {			

	var frm = $(this).closest("form"); // our form	

	swal({   
		title: "¿Esta seguro?",   
		text: "No va a poder recuperar otra vez este registro",   
		type: "warning",   showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Sí, borrar",   
		cancelButtonText: "No, cancelar"
		// closeOnConfirm: false //
		}, 
		function(isConfirm){   
			if (isConfirm) {  
				frm.submit();						
			}
		});
});

if (hasMessage) {
	swal(
		message, 
		"", 
		"success"
		)
}

if (hasMessageError) {
	swal(
		messageError, 
		"", 
		"error"
		)
}