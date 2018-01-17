@extends('template.index')


@section('title')
    Inicio Sesión
@endsection

@section('content')

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Inicio Sesión</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->
 

        <!-- register-area -->
        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">

                <div class="col-md-12">
                    <div class="box-for overflow">                         
                        <div class="col-md-12 col-xs-12 login-blocks">
                            <h2>Inicio : </h2> 
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                {!! csrf_field() !!}
                                    <div class="form-group has-feedback">
                                        <label for="cod_usua">Correo Electronico</label>
                                        <input id="cod_usua" type="email" class="form-control" name="cod_usua" value="{{ old('cod_usua') }}" required autofocus placeholder="">

                                        @if ($errors->has('cod_usua'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cod_usua') }}</strong>
                                        </span>
                                        @endif
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="con_usua">Contraseña</label>
                                        <input id="con_usua" type="password" class="form-control" name="con_usua" required ">

                                        @if ($errors->has('con_usua'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('con_usua') }}</strong>
                                        </span>
                                        @endif 
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                 <div class="form-group has-feedback">
                                    <!-- Button trigger modal -->
                                    <a data-toggle="modal" data-target="#exampleModal">
                                      Recuperar Contraseña
                                    </a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default"> Iniciar</button>
                                </div>
                            </form>
                            <br>
                            
                
                        </div>
                        
                    </div>
                </div>

            </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Correo Electronico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                    <input id="correo" type="email" class="form-control" name="correo" value="" required autofocus placeholder="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="enviocorreo()" data-dismiss="modal">Recuperar</button>
              </div>
            </div>
          </div>
        </div>


        </div> 




@endsection

@section('js')

<script type="text/javascript">
    function enviocorreo()
    {
        var correo = $("#correo").val();
        var PostUri = "{{ route('correo.enviocorreo')}}"; 

        $.ajax({
            url: PostUri,
            type: 'post',
            data: {
                destinatario: correo
            },
            headers: {
                'X-CSRF-TOKEN': "{{ Session::token() }}", //for object property name, use quoted notation shown in second
            },
            success: function (data) {
                alert("Se ha enviado un correo con la nueva Contraseña");
            }
        });

    }
    </script>
@endsection