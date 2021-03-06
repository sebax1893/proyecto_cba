@extends('layouts.app')
@section('title', 'Ingresar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Iniciar Sesión
                </div>
                <div class="panel-body">

                    {!!Form::open(['route'=>'log.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}                    
                        <div class="form-group">
                            {!!Form::label('email', 'Correo electrónico', ['class' => 'col-md-4 control-label'])!!}                            
                            <div class="col-md-6">
                                {!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresar el correo electrónico'])!!}
                                @if ($errors->has('email'))
                                    <div class="list-group-item list-group-item-warning">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group">
                            {!!Form::label('password', 'Contraseña', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresar la contraseña'])!!}
                                @if ($errors->has('password'))
                                    <div class="list-group-item list-group-item-warning">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">                                
                                {!!Form::checkbox('remember')!!} Recordarme                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!!Form::submit('Ingresar', ['class'=>'btn btn-primary'])!!}                                
                                
                                {!!link_to('password/email', $title = '¿Olvidó su contraseña?', $attributes = null, $secure = null)!!}
                            </div>
                        </div>
                    {!!Form::close()!!}            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
