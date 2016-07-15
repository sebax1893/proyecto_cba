@extends('layouts.app')
@section('title', 'Modificar estudiante')
@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	Modificar estudiante
	                </div>
	                <div class="panel-body">
	                	{!!Form::model($estudiante, ['route'=> ['estudiante.update', $estudiante->id_estudiantes], 'method'=>'PATCH', 'files'=>true])!!}

	                		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
{{$countParientes}}
                        <div class="form-group">
                            {!!Form::label('id_tipo_documentos', 'Tipo de documento', ['class' => 'required'])!!}
                            {!!Form::select('id_tipo_documentos', $tipoDocumento, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
                            @if ($errors->has('id_tipo_documentos'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('id_tipo_documentos') }}</strong>       
                                </div>      
                            @endif
                        </div>                        

                        <div class="form-group">
                            {!!Form::label('numeroIdentificacion', 'Número de idenfiticación', ['class' => 'required'])!!}
                            {!!Form::number('numeroIdentificacion',null,['class'=>'form-control', 'placeholder'=>'Número de identificación del estudiante'])!!}
                            @if ($errors->has('numeroIdentificacion'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('numeroIdentificacion') }}</strong>       
                                </div>      
                            @endif
                        </div>

                        <div class="form-group">
                            {!!Form::label('nombres', 'Nombres', ['class' => 'required'])!!}
                            {!!Form::text('nombres',null,['class'=>'form-control', 'placeholder'=>'Nombres del estudiante'])!!}
                            @if ($errors->has('nombres'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('nombres') }}</strong>       
                                </div>      
                            @endif
                        </div>

                        <div class="form-group">
                            {!!Form::label('apellidos', 'Apellidos', ['class' => 'required'])!!} 
                            {!!Form::text('apellidos',null,['class'=>'form-control', 'placeholder'=>'Apellidos del estudiante'])!!}
                            @if ($errors->has('apellidos'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('apellidos') }}</strong>      
                                </div>      
                            @endif
                        </div>

                        <div class="form-group">
                            {!!Form::label('edad', 'Edad', ['class' => 'required'])!!}    
                            {!!Form::number('edad', null, ['class'=>'form-control', 'placeholder'=>'Edad del estudiante'])!!}
                            @if ($errors->has('edad'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('edad') }}</strong>       
                                </div>      
                            @endif
                        </div>    

                        <div class="form-group">
                            {!!Form::label('fechaNacimiento', 'Fecha de nacimiento', ['class' => 'required'])!!}  
                            {!!Form::text('fechaNacimiento',null,['id'=>'datepicker', 'class'=>'form-control', 'placeholder'=>'DD/MM/AAAA'])!!}                             
                            @if ($errors->has('fechaNacimiento'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('fechaNacimiento') }}</strong>       
                                </div>      
                            @endif
                        </div>       

                        <div class="form-group">
                            {!!Form::label('direccion', 'Dirección', ['class' => 'required'])!!} 
                            {!!Form::text('direccion',null,['class'=>'form-control', 'placeholder'=>'Dirección  del estudiante'])!!}
                            @if ($errors->has('direccion'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('direccion') }}</strong>      
                                </div>      
                            @endif
                        </div>

                        <div class="form-group">
                            {!!Form::label('id_municipios', 'Municipio', ['class' => 'required'])!!}
                            
                            {!!Form::select('id_municipios', $municipio, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
                            @if ($errors->has('id_municipios'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('id_municipios') }}</strong>       
                                </div>      
                            @endif
                        </div> 

                        <div class="form-group" id="subregionDiv">
                            {!!Form::label('subregion', 'Subregión', ['class' => ''])!!}
                            {!!Form::text('subregion',null,['class'=>'form-control', 'placeholder'=>'Subregión', 'disabled'])!!}                          
                        </div> 

                        <div class="form-group">
                            {!!Form::label('barrio', 'Barrio', ['class' => 'required'])!!} 
                            {!!Form::text('barrio',null,['class'=>'form-control', 'placeholder'=>'Barrio del estudiante'])!!}
                            @if ($errors->has('barrio'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('barrio') }}</strong>      
                                </div>      
                            @endif
                        </div>   

                        <div class="form-group">
                            {!!Form::label('telefono', 'Número de teléfono', ['class' => 'required'])!!}    
                            {!!Form::number('telefono', null, ['class'=>'form-control', 'placeholder'=>'Número de teléfono del estudiante'])!!}
                            @if ($errors->has('telefono'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('telefono') }}</strong>       
                                </div>      
                            @endif
                        </div>  

                        <div class="form-group">
                            {!!Form::label('celular', 'Número de celular', ['class' => ''])!!}    
                            {!!Form::number('celular', null, ['class'=>'form-control', 'placeholder'=>'Número de celular del estudiante'])!!}
                            @if ($errors->has('celular'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('celular') }}</strong>       
                                </div>      
                            @endif
                        </div> 

                        <div class="form-group">
                            {!!Form::label('correo', 'Correo electrónico', ['class' => 'required'])!!} 
                            {!!Form::email('correo',null,['class'=>'form-control', 'placeholder'=>'Correo electrónico del estudiante'])!!}
                            @if ($errors->has('correo'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('correo') }}</strong>      
                                </div>      
                            @endif
                        </div> 

                        <div class="form-group">
                            {!!Form::label('id_eps', 'EPS', ['class' => 'required'])!!}
                            {!!Form::select('id_eps', $eps, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
                            @if ($errors->has('id_eps'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('id_eps') }}</strong>       
                                </div>      
                            @endif
                        </div>

                        <div class="form-group">
                            {!!Form::label('foto', 'Imagen de perfíl', ['class' => ''])!!}
                            {!!Form::file('foto')!!}                                
                            @if ($errors->has('foto'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('foto') }}</strong>       
                                </div>      
                            @endif                                
                        </div>		

                        <!-- SECCIÓN PARIENTES -->
                        <div class="panel panel-info">
                            <div class="panel-heading">Parientes</div>
                            <div id="divParientes" class="panel-body">

                                <div class="panel panel-danger">
                                    <div class="panel-heading">Representante legal</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">      

                                                <div class="form-group">
                                                    {!!Form::label('id_parentescos', 'Parentesco', ['class' => 'required'])!!}                                                    
                                                    {!!Form::select('parientes[0][id_parentescos]', $parentesco, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}                                                    
                                                    @if ($errors->has('parientes.0.id_parentescos'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>El campo parentesco es obligatorio</strong>
                                                        </div>      
                                                    @endif                                                
                                                </div>                          

                                                <div class="form-group">                                        
                                                    {!!Form::label('nombre', 'Nombre del representante legal', ['class' => 'required'])!!}    
                                                    {!!Form::text('parientes[0][nombre]',null,['class'=>'form-control', 'placeholder'=>'Nombre del representante legal del estudiante'])!!}                     
                                                    @if ($errors->has('parientes.0.nombre'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>El campo nombre del representante legal es obligatorio</strong>      
                                                        </div>      
                                                    @endif                                      
                                                </div>                                                

                                                <div class="form-group">
                                                    {!!Form::label('contacto', 'Celular o fijo del pariente', ['class' => ''])!!} 
                                                    {!!Form::number('parientes[0][telefono]', null, ['class'=>'form-control', 'placeholder'=>'Contacto del pariente del estudiante'])!!}
                                                    @if ($errors->has('contacto'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>{{ $errors->first('contacto') }}</strong>      
                                                        </div>      
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                <div class="panel panel-danger">
                                    <div class="panel-heading">Pariente</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">      

                                                <div class="form-group">
                                                    {!!Form::label('id_parentescos', 'Parentesco', ['class' => 'required'])!!}                                                    
                                                    {!!Form::select('parientes[1][id_parentescos]', $parentesco, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}                                                   
                                                    @if ($errors->has('parientes.1.id_parentescos'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>El campo parentesco es obligatorio</strong>
                                                        </div>      
                                                    @endif                                                
                                                </div>                          

                                                <div class="form-group">                                        
                                                    {!!Form::label('nombre', 'Nombre del representante legal', ['class' => 'required'])!!}    
                                                    {!!Form::text('parientes[1][nombre]',null,['class'=>'form-control', 'placeholder'=>'Nombre del representante legal del estudiante'])!!}                     
                                                    @if ($errors->has('parientes.1.nombre'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>El campo nombre del representante legal es obligatorio</strong>      
                                                        </div>      
                                                    @endif                                      
                                                </div>                                                

                                                <div class="form-group">
                                                    {!!Form::label('contacto', 'Celular o fijo del pariente', ['class' => ''])!!} 
                                                    {!!Form::number('parientes[1][telefono]', null, ['class'=>'form-control', 'placeholder'=>'Contacto del pariente del estudiante'])!!}
                                                    @if ($errors->has('contacto'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>{{ $errors->first('contacto') }}</strong>      
                                                        </div>      
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    {!!Form::button('Añadir pariente', ['id'=>'btnPariente', 'class'=>'btn btn-warning'])!!}
                                </div>                                                                                
                            </div>
                        </div>		

                        <!-- SECCIÓN BANDAS -->
                        <div class="panel panel-info">
                            <div class="panel-heading">Bandas</div>
                            <div id="divBandas" class="panel-body">

                                <div class="panel panel-danger">
                                    <div class="panel-heading">Banda a la que pertenece actualmente</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">      

                                                <div class="form-group">
                                                    {!!Form::label('id_bandas', 'Banda', ['class' => 'required'])!!}
                                                    {!!Form::select('bandas[0][id_bandas]', $banda, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}  
                                                    @if ($errors->has('bandas.0.id_bandas'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>El campo banda es obligatorio</strong>       
                                                        </div>      
                                                    @endif                                   
                                                </div>

                                            </div>
                                        </div>
                                    </div>                                    
                                </div>   

                                <div class="form-group">
                                    {!!Form::button('Añadir banda a la que ha pertenecido', ['id'=>'btnBanda', 'class'=>'btn btn-warning'])!!}
                                </div>                                                                                
                            </div>
                        </div>		
							
		                {!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}

	                	{!!Form::close()!!}
					    
			    	</div>
		    	</div>
	    	</div>
    	</div>
    	&nbsp;
    	<div class="row">
    		{!!link_to_route('estudiante.index', $title = 'Regresar', null, $attributes = ['class'=>'btn btn-success'])!!}
    	</div>
	</div>
@endsection