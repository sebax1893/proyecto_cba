
$('#dataTable').on('click', '.btn-danger' , function () {			

	var frm = $(this).closest("form"); // our form	

	swal({   
		title: "¿Esta seguro? Todos los registros que tienen este dato también serán eliminados",   
		text: "No va a poder recuperar otra vez este registro",   
		type: "warning",   showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Sí, borrar",   
		cancelButtonText: "No, cancelar",
		allowOutsideClick: true
		// closeOnConfirm: false //
		}, 
		function(isConfirm){   
			if (isConfirm) {  
				frm.submit();						
			}
		});
});

if (hasMessage) {
	swal({
		title: "",
		text: message,
		type: "success",
		confirmButtonText: "Aceptar",
		allowOutsideClick: true
	})
}

if (hasMessageError) {
	swal({
		title: "Error",
		text: messageError,
		type: "error",
		confirmButtonText: "Aceptar",
		allowOutsideClick: true
	})
}