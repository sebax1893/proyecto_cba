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
                            {!!Form::text('fechaNacimiento',null,['id'=>'datepicker', 'class'=>'form-control', 'placeholder'=>'AAAA/MM/DD'])!!}                             
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
                            
                                @for($i = 1; $i < $countParientes; $i++)
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">Pariente</div>
                                        <div id="divNuevoPariente" name="nuevoPariente" data-field-id="{{$i}}"></div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6">      
                                                    <div class="form-group">
                                                        {!!Form::label('id_parentescos', 'Parentesco', ['class' => 'required'])!!}                                                    
                                                        {!!Form::select('parientes[' . $i . '][id_parentescos]', $parentesco, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}                                                   
                                                        @if ($errors->has('parientes[' . $i . ']id_parentescos'))
                                                            <div class="list-group-item list-group-item-warning">       
                                                                <strong>El campo parentesco es obligatorio</strong>
                                                            </div>      
                                                        @endif                                                
                                                    </div>                          

                                                    <div class="form-group">                                        
                                                        {!!Form::label('nombre', 'Nombre del representante legal', ['class' => 'required'])!!}    
                                                        {!!Form::text('parientes[' . $i . '][nombre]',null,['class'=>'form-control', 'placeholder'=>'Nombre del representante legal del estudiante'])!!}                     
                                                        @if ($errors->has('parientes[' . $i . ']nombre'))
                                                            <div class="list-group-item list-group-item-warning">       
                                                                <strong>El campo nombre del representante legal es obligatorio</strong>      
                                                            </div>      
                                                        @endif                                      
                                                    </div>                                                

                                                    <div class="form-group">
                                                        {!!Form::label('contacto', 'Celular o fijo del pariente', ['class' => ''])!!} 
                                                        {!!Form::number('parientes[' . $i . '][telefono]', null, ['class'=>'form-control', 'placeholder'=>'Contacto del pariente del estudiante'])!!}
                                                        @if ($errors->has('contacto'))
                                                            <div class="list-group-item list-group-item-warning">       
                                                                <strong>{{ $errors->first('contacto') }}</strong>      
                                                            </div>      
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar
                                            </button>
                                        </div>
                                    </div>
                                @endfor                            

                                <div class="form-group">
                                    {!!Form::button('Añadir pariente', ['id'=>'btnPariente', 'class'=>'btn btn-warning'])!!}
                                </div>                                                                                
                            </div>
                        </div>		

                        <!-- SECCIÓN BANDAS -->
                        <div class="panel panel-info">
                            <div class="panel-heading">Bandas</div>
                            <div id="divBandas" class="panel-body">                                              
                                <div id="divNuevaBanda" name="nuevaBanda" data-field-id="{{$aux}}"></div>
                                @for($i = 0; $i < $aux; $i++)
                                    @if ($cosa[$i] == 1)
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">Banda a la que pertenece actualmente</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-6">      

                                                        <div class="form-group">
                                                            {!!Form::label('id_bandas', 'Banda', ['class' => 'required'])!!}
                                                            {!!Form::select('bandas[' . $i . '][id_bandas]', $banda, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}  
                                                            @if ($errors->has('bandas.' . $i . '.id_bandas'))
                                                                <div class="list-group-item list-group-item-warning">       
                                                                    <strong>El campo banda es obligatorio</strong>       
                                                                </div>      
                                                            @endif                                   
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>                                    
                                        </div>                                    
                                    @endif                                    
                                @endfor

                                @for($i = 0; $i < $aux; $i++)
                                    @if ($cosa[$i] == 0)
                                        <div class="panel panel-success">
                                            <div class="panel-heading">Banda a la que ha pertenecido</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-6">      

                                                        <div class="form-group">
                                                            {!!Form::label('id_bandas', 'Banda', ['class' => 'required'])!!}
                                                            {!!Form::select('bandas[' . $i . '][id_bandas]', $banda, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}  
                                                            @if ($errors->has('bandas.' . $i . '.id_bandas'))
                                                                <div class="list-group-item list-group-item-warning">       
                                                                    <strong>El campo banda es obligatorio</strong>       
                                                                </div>      
                                                            @endif                                   
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="panel-footer">
                                                <button type="button" class="btn btn-default" aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar
                                                </button>
                                            </div>                                  
                                        </div>
                                    @endif
                                @endfor  

                                <div class="form-group">
                                    {!!Form::label('observaciones', 'Observaciones', ['class' => ''])!!}
                                    {!!Form::textarea('observaciones',null,['class'=>'form-control', 'placeholder'=>'Observaciones del estudiante'])!!}
                                    @if ($errors->has('observaciones'))
                                        <div class="list-group-item list-group-item-warning">       
                                            <strong>{{ $errors->first('observaciones') }}</strong>        
                                        </div>      
                                    @endif
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

@section('scripts')
    <script type="text/javascript">

        /* Inicializar el datepicker (calendario) de Bootstrap con formato de fecha normal y en idioma español */
        $('#datepicker').datepicker({
            format: "yyyy/mm/dd",
            language: "es"
        });   

        /* Municipios y Subregiones */
        $(function () {
            var subregionInput = $('#subregion');
            var subregionDiv = $('#subregionDiv')
            subregionDiv.css('display', 'none');
            
            $('#id_municipios').change(function () {

                var municipioDropDownValue = $('#id_municipios').val();
                
                var token = $("#token").val();

                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'POST',                    
                    url: "/proyecto_cba/public/institucion/obtenerSubregion",
                    data: {id_municipio: municipioDropDownValue},
                    dataType: 'json',
                    success: function(data){

                        var subregion = data[0].nombre;

                        subregionDiv.show();
                        subregionInput.val(subregion);           
                    }
                })
            });
        });

        $(document).ready(function() {
            var wrapper = $("#divParientes"); //Fields wrapper
            var add_button = $("#btnPariente"); //Add button ID            
            
            var wrapperBandas = $('#divBandas');
            var add_button_bandas = $('#btnBanda');

            // var auxParientes = 1; 
            // var auxBandas = 1; 

            var maxFieldIdPariente; // Para continuar con el siguiente id en estos brakets parientes[maxId][campo]
            var maxFieldIdBanda = $("div[name=nuevaBanda]").data("field-id");

            // var fieldId = $('#div').data("field-id");

            $("div[name=nuevoPariente]").each(function( index ) {
                maxFieldIdPariente = $(this).data("field-id");
                // console.log(index + ": " + $( this ).data("field-id"));
            });

            maxFieldIdPariente++;

            console.log(maxFieldIdBanda);


            /* AÑADIR PARIENTES */            
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();

                //Add new inputs
                $(wrapper).append(
                    '<div class="panel panel-success">' +
                        '<div class="panel-heading">Nuevo pariente</div>' +
                        '<div class="panel-body">' + 
                            '<div class="row">' + 
                                '<div class="col-lg-6">'+
                                    '<div class="form-group">' + 
                                        '{!!Form::label("id_parentescos", "Parentesco", ["class" => "required"])!!}' + 
                                        '<select class="form-control" name="parientes[' + maxFieldIdPariente + '][id_parentescos]">' + 
                                        '<option selected="selected" value="">Seleccionar</option>' +
                                            '@foreach($parentescos as $item)' +
                                                '<option value="{{$item->id_parentescos}}">{{$item->nombre}}</option>' +
                                            '@endforeach' +
                                        '</select>' +
                                    '</div>' +
                                    '<div class="form-group">' + 
                                        '{!!Form::label("nombre", "Nombre del pariente", ["class" => ""])!!}' + 
                                        '<input class="form-control" placeholder="Nombre del pariente del estudiante" name="parientes[' + maxFieldIdPariente + '][nombre]" type="text">' + 
                                    '</div>' +                                    
                                    '<div class="form-group">' + 
                                        '{!!Form::label("contacto", "Celular o fijo del pariente", ["class" => ""])!!}' + 
                                        '<input class="form-control" placeholder="Contacto del pariente del estudiante" name="parientes[' + maxFieldIdPariente + '][telefono]" type="number">' +
                                    '</div>' +
                                '</div>' + 
                            '</div>' + 
                        '</div>' +
                        '<div class="panel-footer">' + 
                            '<button type="button" class="btn btn-default" aria-label="Left Align">' + 
                                '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar' + 
                            '</button>' + 
                        '</div>' + 
                    '</div>'
                ); 
                maxFieldIdPariente++; //text box increment                

            });

            /* AÑADIR BANDAS */
            $(add_button_bandas).click(function(e){ //on add input button click
                e.preventDefault();

                //Add new inputs
                $(wrapperBandas).append(
                    '<div class="panel panel-success">' +
                        '<div class="panel-heading">Nueva banda a la que ha pertenecido</div>' +
                        '<div class="panel-body">' + 
                            '<div class="row">' + 
                                '<div class="col-lg-6">'+
                                    '<div class="form-group">' + 
                                        '{!!Form::label("id_bandas", "Banda", ["class" => ""])!!}' + 
                                        '<select class="form-control" name="bandas[' + maxFieldIdBanda + '][id_bandas]">' +
                                        '<option selected="selected" value="">Seleccionar</option>' +
                                            '@foreach($bandas as $item)' +
                                                '<option value="{{$item->id_bandas}}">{{$item->nombre}}</option>' +
                                            '@endforeach' +
                                        '</select>' +
                                        '@if ($errors->has("bandas.' + maxFieldIdBanda + '.id_bandas"))' +
                                            '<div class="list-group-item list-group-item-warning">' +
                                                '<strong>{{ $errors->first("observaciones") }}</strong>' +
                                            '</div>' +
                                        '@endif' +
                                    '</div>' +                                
                                '</div>' + 
                            '</div>' + 
                        '</div>' +
                        '<div class="panel-footer">' + 
                            '<button type="button" class="btn btn-default" aria-label="Left Align">' + 
                                '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar' + 
                            '</button>' + 
                        '</div>' + 
                    '</div>'
                ); 
                maxFieldIdBanda++; //text box increment                

            });

            /* ELIMINAR PARIENTE */
            $(wrapper).on("click",".btn-default", function(e){ //user click on remove text
                e.preventDefault(); 
                $(this).parent('div').parent('div').remove();
            })

            /* ELIMINAR BANDAS */
            $(wrapperBandas).on("click",".btn-default", function(e){ //user click on remove text
                e.preventDefault(); 
                $(this).parent('div').parent('div').remove();
            })

        });

    </script>
@endsection