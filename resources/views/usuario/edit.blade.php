@extends('layouts.app')
@section('title', 'Modificar usuario')
@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	Modificar Usuario
	                </div>
	                <div class="panel-body">
	                	{!!Form::model($user,['route'=> ['usuario.update', $user->id],'method'=>'PATCH'])!!}

	                		<div class="form-group">
								{!!Form::label('name', 'Nombre')!!}
								{!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Ingresar nuevo nombre de usuario'])!!}
								@if ($errors->has('name'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('name') }}</strong>	    
									</div>	    
								@endif
							</div>

							<div class="form-group">
								{!!Form::label('email', 'Correo electrónico')!!} 
								{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresar nuevo correo electrónico'])!!}
								@if ($errors->has('email'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('email') }}</strong>	    
									</div>	    
								@endif
							</div>

							<div class="form-group">
								{!!Form::label('password', 'Contraseña')!!}	
								{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresar nueva contraseña si lo desea'])!!}
								@if ($errors->has('password'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('password') }}</strong>	    
									</div>	    
								@endif
							</div>

							<div class="form-group">
								{!!Form::label('password_confirmation', 'Confirmar nueva contraseña')!!} 
								{!!Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Confirmar la nueva contraseña'])!!}
								@if ($errors->has('password_confirmation'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('password_confirmation') }}</strong>	    
									</div>	    
								@endif
							</div>

							<div class="form-group">
								{!!Form::label('is_admin', 'Es Administrador')!!} *	
								<br>
								Sí {!!Form::radio('is_admin', 1)!!} <br>
								No {!!Form::radio('is_admin', 0)!!}
								@if ($errors->has('is_admin'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('is_admin') }}</strong>	    
									</div>	    
								@endif
							            
							</div>
							
		                	{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}

	                	{!!Form::close()!!}
					    
			    	</div>
		    	</div>
	    	</div>
    	</div>
    	&nbsp;
    	<div class="row">
    		{!!link_to_route('usuario.index', $title = 'Regresar', null, $attributes = ['class'=>'btn btn-success'])!!}
    	</div>
	</div>
@endsection