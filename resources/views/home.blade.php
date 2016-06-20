@extends('layouts.app')
@section('title', 'Index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Página principal</div>

                <div class="panel-body">
                    Inicio de sesión exitoso.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var message = "{{ Session::get('message') }}"       

        if ("{{ Session::has('message') }}") {
            swal(
                message, 
                "", 
                "error"
                )
        }

    </script>
@endsection