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
                            {!!Form::label('tipo_documento', 'Tipo de documento', ['class' => 'required'])!!}
                            {!!Form::select('tipo_documento', $tipoDocumento, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
                            @if ($errors->has('tipo_documento'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('tipo_documento') }}</strong>       
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
                            {!!Form::label('eps', 'EPS', ['class' => 'required'])!!}
                            {!!Form::select('eps', $eps, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
                            @if ($errors->has('eps'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('eps') }}</strong>       
                                </div>      
                            @endif
                        </div>
                        
                        <div class="form-group">
                            {!!Form::label('nombrePadre', 'Nombre del padre', ['class' => 'required'])!!} 
                            {!!Form::text('nombrePadre',null,['class'=>'form-control', 'placeholder'=>'Nombre del padre del estudiante'])!!}
                            @if ($errors->has('nombrePadre'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('nombrePadre') }}</strong>      
                                </div>      
                            @endif
                        </div>   

                        <div class="form-group">
                            {!!Form::label('foto', 'Imagen de perfíl', ['class' => ''])!!}
                            {!! Form::file('foto') !!}                                
                            @if ($errors->has('foto'))
                                <div class="list-group-item list-group-item-warning">       
                                    <strong>{{ $errors->first('foto') }}</strong>       
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

@endsection
@section('scripts')
    <script type="text/javascript">

        

        $('#datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "es"
        });
    </script>
@endsection
