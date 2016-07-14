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
