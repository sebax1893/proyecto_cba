<div class="form-group">
	{!!Form::label('name', 'Nombre', ['class' => 'required'])!!}
	{!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Ingresar el nombre de usuario'])!!}
	@if ($errors->has('name'))
		<div class="list-group-item list-group-item-warning">		
	        <strong>{{ $errors->first('name') }}</strong>	    
		</div>	    
	@endif
</div>

<div class="form-group">
	{!!Form::label('email', 'Correo electrónico')!!} *
	{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresar el correo electrónico'])!!}
	@if ($errors->has('email'))
		<div class="list-group-item list-group-item-warning">		
	        <strong>{{ $errors->first('email') }}</strong>	    
		</div>	    
	@endif
</div>

<div class="form-group">
	{!!Form::label('password', 'Contraseña')!!}	*
	{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresar la contraseña'])!!}
	@if ($errors->has('password'))
		<div class="list-group-item list-group-item-warning">		
	        <strong>{{ $errors->first('password') }}</strong>	    
		</div>	    
	@endif
</div>

<div class="form-group">
	{!!Form::label('password_confirmation', 'Confirmar contraseña')!!} *
	{!!Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Confirmar la contraseña'])!!}
	@if ($errors->has('password_confirmation'))
		<div class="list-group-item list-group-item-warning">		
	        <strong>{{ $errors->first('password_confirmation') }}</strong>	    
		</div>	    
	@endif
</div>

<div class="form-group">
	{!!Form::label('Es Administrador')!!} *	
	<br>
	Sí {!!Form::radio('is_admin', 1)!!} <br>
	No {!!Form::radio('is_admin', 0)!!}
	@if ($errors->has('is_admin'))
		<div class="list-group-item list-group-item-warning">		
	        <strong>{{ $errors->first('is_admin') }}</strong>	    
		</div>	    
	@endif
            
</div>

