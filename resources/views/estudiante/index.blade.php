@extends('layouts.app')
@section('title', 'Gestionar estudiantes')
@section('content')
<div class="container">
	@if (Auth::user()->is_admin == 1)
	<div class="row">
		<div class="">
			{!!link_to_route('estudiante.create', $title = 'Registrar estudiante', null, $attributes = ['class'=>'btn btn-primary'])!!}
		</div>
	</div>
	@endif
	&nbsp;
	<div class="row">
		
		<div class="">
			<table class="table table-striped table-bordered" id="dataTable">
				<thead>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Es administrador</th>
					<th>Operación</th>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>	

	</div>

</div>

@endsection

@section('scripts')

	<script type="text/javascript">

		$(function() {
			$('#dataTable').dataTable({
				// No permitir ordenar la columna de Operación
				"aoColumnDefs": [
					{ 'bSortable': false, 'aTargets': [ 3 ] }
				],
				// Usar el lenguaje español
				"oLanguage": {
				  "sUrl": "Espaniol.json"				  
				},
				// Para iniciar siempre la tabla con la columna de Es Administrador ordenada descendentemente para mostrar 
				// primero las cuentas con rol administrador
				"aaSorting": [[2,'desc']]	
			});
		});		

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
		
		var message = "{{ Session::get('message') }}"		

		if ("{{ Session::has('message') }}") {
			swal(
				message, 
				"", 
				"success"
				)
		}

	</script>

@endsection
