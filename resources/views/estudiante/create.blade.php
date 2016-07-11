@extends('layouts.app')
@section('title', 'Registrar estudiante')
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registrar estudiante
                </div>
                <div class="panel-body">

                    {!!Form::open(['route'=>'estudiante.store', 'method'=>'POST', 'files'=>true])!!}

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
                            {!!Form::label('id_municipios', 'Municipio de Antioquia', ['class' => 'required'])!!}
                            {!!Form::select('id_municipios', $municipio, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
                            @if ($errors->has('id_municipios'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('id_municipios') }}</strong>       
                                </div>      
                            @endif
                        </div>  

                        <div class="form-group">
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
                                                    <select class="form-control" name="parientes[0][id_parentescos]">   <option selected="selected" value="">Seleccionar</option> 
                                                            @foreach($parentesco as $item) 
                                                                <option value="{{$item->id_parentescos}}">{{$item->nombre}}</option> 
                                                            @endforeach 
                                                    </select>                                                   
                                                    @if ($errors->has('parientes.0.id_parentescos'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>{{ $errors->first('parientes.0.id_parentescos') }}</strong>       
                                                        </div>      
                                                    @endif                                                

                                                </div>                          

                                                <div class="form-group">                                        
                                                    {!!Form::label('nombre', 'Nombre del representante legal', ['class' => 'required'])!!}    
                                                    {!!Form::text('parientes[0][nombre]',null,['class'=>'form-control', 'placeholder'=>'Nombre del representante legal del estudiante'])!!}                     
                                                    @if ($errors->has('nombre'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>{{ $errors->first('nombre') }}</strong>      
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
                                                    <select class="form-control" name="bandas[0][id_bandas]">   
                                                    <option selected="selected" value="">Seleccionar</option> 
                                                            @foreach($banda as $item) 
                                                                <option value="{{$item->id_bandas}}">{{$item->nombre}}</option> 
                                                            @endforeach 
                                                    </select>                                                   
                                                    @if ($errors->has('id_bandas'))
                                                        <div class="list-group-item list-group-item-warning">       
                                                            <strong>{{ $errors->first('id_bandas') }}</strong>       
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

                        <div class="form-group">
                            {!!Form::label('observaciones', 'Observaciones', ['class' => 'required'])!!}
                            {!!Form::textarea('observaciones',null,['class'=>'form-control', 'placeholder'=>'Observaciones del estudiante'])!!}
                            @if ($errors->has('observaciones'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('observaciones') }}</strong>        
                                </div>      
                            @endif
                        </div>                                                                      

                        {!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}

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
{{-- */$i=0;/* --}}
@endsection
@section('scripts')
    <script type="text/javascript">

        /* Inicializar el datepicker (calendario) de Bootstrap con formato de fecha normal y en idioma español */
        $('#datepicker').datepicker({
            format: "yyyy/mm/dd",
            language: "es"
        });

        /* Darle el estilo de Bootstrap a los tooltips (Mensajes que salen cuando se pasa el mouse por encima
        de una etiqueta HTML) */
        $("input[name='es_representante']").tooltip();

        $(document).ready(function() {
            var wrapper = $("#divParientes"); //Fields wrapper
            var add_button = $("#btnPariente"); //Add button ID            
            
            var wrapperBandas = $('#divBandas');
            var add_button_bandas = $('#btnBanda');

            var auxParientes = 1; //initlal text box count
            var auxBandas = 1; //initlal text box count

            /* AÑADIR PARIENTES */            
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();

                //Add new inputs
                $(wrapper).append(
                    '<div id=pariente' + auxParientes +', class="panel panel-success">' +
                        '<div class="panel-heading">Pariente ' + auxParientes + '</div>' +
                        '<div class="panel-body">' + 
                            '<div class="row">' + 
                                '<div class="col-lg-6">'+
                                    '<div class="form-group">' + 
                                        '{!!Form::label("id_parentescos", "Parentesco", ["class" => "required"])!!}' + 
                                        '<select class="form-control" name="parientes[' + auxParientes + '][id_parentescos]">' + 
                                        '<option selected="selected" value="">Seleccionar</option>' +
                                            '@foreach($parentesco as $item)' +
                                                '<option value="{{$item->id_parentescos}}">{{$item->nombre}}</option>' +
                                            '@endforeach' +
                                        '</select>' +
                                    '</div>' +
                                    '<div class="form-group">' + 
                                        '{!!Form::label("nombre", "Nombre del pariente", ["class" => ""])!!}' + 
                                        '<input class="form-control" placeholder="Nombre del pariente del estudiante" name="parientes[' + auxParientes + '][nombre]" type="text">' + 
                                    '</div>' +                                    
                                    '<div class="form-group">' + 
                                        '{!!Form::label("contacto", "Celular o fijo del pariente", ["class" => ""])!!}' + 
                                        '<input class="form-control" placeholder="Contacto del pariente del estudiante" name="parientes[' + auxParientes + '][telefono]" type="number">' +
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
                auxParientes++; //text box increment                

            });

            /* AÑADIR BANDAS */
            $(add_button_bandas).click(function(e){ //on add input button click
                e.preventDefault();

                //Add new inputs
                $(wrapperBandas).append(
                    '<div class="panel panel-success">' +
                        '<div class="panel-heading">Banda a la que ha pertenecido ' + auxBandas + '</div>' +
                        '<div class="panel-body">' + 
                            '<div class="row">' + 
                                '<div class="col-lg-6">'+
                                    '<div class="form-group">' + 
                                        '{!!Form::label("id_bandas", "Banda", ["class" => ""])!!}' + 
                                        '<select class="form-control" name="bandas[' + auxBandas + '][id_bandas]">' +
                                        '<option selected="selected" value="">Seleccionar</option>' +
                                            '@foreach($banda as $item)' +
                                                '<option value="{{$item->id_bandas}}">{{$item->nombre}}</option>' +
                                            '@endforeach' +
                                        '</select>' +
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
                auxBandas++; //text box increment                

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
