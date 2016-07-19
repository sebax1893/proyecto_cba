@extends('layouts.app')
@section('title', 'Reiniciar contraseña')
<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!!Form::open(['url'=>'/password/email'])!!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!!Form::label('email', 'Correo electrónico', ['class' => 'required col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                                                
                                {!!Form::text('email',null,['class'=>'form-control', 'placeholder'=>'Ingresar el correo electrónico vinculado a la cuenta'])!!}

                                @if ($errors->has('email'))
                                    <div class="list-group-item list-group-item-warning">       
                                        <strong>{{ $errors->first('email') }}</strong>       
                                    </div>      
                                @endif
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">                                
                                {!!Form::submit('Enviar link de restablecimiento de contraseña', ['class'=>'btn btn-primary'])!!}
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
