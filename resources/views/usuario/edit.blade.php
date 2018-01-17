@extends('template.index')


@section('title')
    Editar Usuario
@endsection

@section('css')
        <link rel="stylesheet" href="{{ asset('datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{ asset('select2/select2.min.css')}} ">
@endsection

@section('content')

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Editar Usuario</h1>               
                    </div>
                </div>
            </div>
        </div>

        
 
         <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="" id="contact1">                        
                            {!! Form::open(['route' => ['usuario.update', $id], 'method' => 'PUT', 'files'=>true]) !!}
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group input-group-sm">
                                            <label  for="tip_perf">Perfil *</label>
                                            <select id="tip_perf"  class="form-control select2" name="tip_perf" onchange='validaperfil()' required>
                                              <option value="">seleccione una opcion</option>
                                              @if($dato->tip_perf == "1")
                                                <option value="1" selected="selected">Administrador</option>
                                                <option value="2">Residente</option>
                                              @endif
                                              @if($dato->tip_perf == "2")
                                                <option value="1">Administrador</option>
                                                <option value="2" selected="selected">Residente</option>
                                              @endif
                                              
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cod_enti">Entidad *</label>
                                            <select class="form-control select2" id="cod_enti" name="cod_enti" required">
                                                <option value="">seleccione una opcion</option>
                                                @if($entidades != null)
                                                @foreach($entidades as $entidad)
                                                    @if($entidad->id == $dato->cod_enti)
                                                        <option  value="{{$entidad->id}}" selected="selected">{{$entidad->nom_enti}}
                                                        </option>
                                                    @else
                                                        <option value="{{$entidad->id}}">{{$entidad->nom_enti}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                              @endif                                     
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label id='labelvivi' for="uni_vivi">Unidad Vivienda</label>
                                            <select class="form-control select2" id="uni_vivi" name="uni_vivi" required">
                                                <option value="">seleccione una opcion</option>
                                                @if($unidades != null)
                                                    @foreach($unidades as $unidad)
                                                      <option value="{{$unidad->id}}">{{$unidad->num_predia}}</option>
                                                    @endforeach
                                                @endif                                         
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="nom_usua">Nombre *</label>
                                            <input type="text" class="form-control" name="nom_usua" value="{{$dato->nom_usua}}"required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="cod_usua">Correo *</label>
                                            <input type="text" class="form-control" name="cod_usua" disabled value="{{$dato->cod_usua}}" required>
                                        </div>
                                    </div>
                                    <div  class="col-sm-4">
                                        <div class="form-group input-group-sm">
                                            <label  for="cod_pais">Pais *</label>
                                            <select id="cod_pais"  class="form-control select2" 
                                            name="cod_pais" onchange='cargarestado()' required>
                                              <option value="">seleccione una opcion</option>
                                              @if($paises != null)
                                                @foreach($paises as $pais)
                                                    @if($pais->id == $dato->cod_pais)
                                                        <option  value="{{$pais->id}}" selected="selected">{{$pais->nom_dipo}}
                                                        </option>
                                                    @else
                                                        <option value="{{$pais->id}}">{{$pais->nom_dipo}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                              @endif
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-sm-4">
                                          <div class="form-group input-group-sm">
                                            <label  for="cod_estado">Departamento *</label>
                                            <select id="cod_estado"  class="form-control select2" name="cod_estado" onchange='cargarciudad()' required>
                                                @if($estados != null)
                                                @foreach($estados as $estado)
                                                    @if($estado->id == $dato->cod_estado)
                                                        <option  value="{{$estado->id}}" selected="selected">{{$estado->nom_dipo}}
                                                        </option>
                                                    @else
                                                        <option value="{{$estado->id}}">{{$estado->nom_dipo}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                              @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group input-group-sm">
                                            <label  for="cod_ciud">Ciudad *</label>
                                            <select id="cod_ciud"  class="form-control select2" name="cod_ciud" required>
                                              <option value="">seleccione una opcion</option>
                                                @if($ciudades != null)
                                                @foreach($ciudades as $ciudad)
                                                    @if($ciudad->id == $dato->cod_ciud)
                                                        <option  value="{{$ciudad->id}}" selected="selected">{{$ciudad->nom_dipo}}
                                                        </option>
                                                    @else
                                                        <option value="{{$ciudad->id}}">{{$ciudad->nom_dipo}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                              @endif
                                            </select>
                                        </div>
                                    </div>
  
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="dir_usua">Direccion</label>
                                            <input type="text" class="form-control" name="dir_usua" value="{{$dato->dir_usua}}" >
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="tel_usua">Telefono</label>
                                            <input type="text" class="form-control" name="tel_usua" value="{{$dato->tel_usua}}">
                                        </div>
                                    </div>
                                     <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="cel_usua">Celular </label>
                                            <input type="text" class="form-control" name="cel_usua" value="{{$dato->cel_usua}}" >
                                        </div>
                                    </div>
                                     <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="dir_phot">Avatar</label>
                                            <input type="file" class="form-control" name="dir_phot" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    </div>
                                </div>
                                <!-- /.row -->
                            {!! Form::close() !!}
                        </div>
                    </div>    
                </div>
               
            </div>
        </div>



@endsection

@section('js')
    <script src="{{ asset('select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('datepicker/bootstrap-datepicker.js')}}"></script>

    <script type="text/javascript">
    
        $(document).ready(function(){
     
        });

        $(".select2").select2();

        function validaperfil()
        {
            var perfil = $("#tip_perf").val();
            if(perfil == "1")
            {
                $("#uni_vivi").removeAttr('required');
                $("#uni_vivi").prop( "disabled", true );
                $("#labelvivi").html("Unidad Vivienda");
             
            }
            if(perfil == "2")
            {
                $("#uni_vivi").attr('required', 'required');
                $("#uni_vivi").prop( "disabled", false );
                $("#labelvivi").html("Unidad Vivienda *");
            }

        }

          function cargarestado()
        {
            var PostUri = "{{ route('division.datos')}}"; 
            var pais = $("#cod_pais").val();

                $.ajax({
                    url: PostUri,
                    type: 'post',
                    data: {
                        cargar: 'E',
                        filtro: pais
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ Session::token() }}", //for object property name, use quoted notation shown in second
                    },
                    success: function (data) {

                        $("#cod_estado").html(data);
                        
                    }
                });

        }

        function cargarciudad()
        {
            var PostUri = "{{ route('division.datos')}}"; 
            var estado = $("#cod_estado").val();

                $.ajax({
                    url: PostUri,
                    type: 'post',
                    data: {
                        cargar: 'C',
                        filtro: estado
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ Session::token() }}", //for object property name, use quoted notation shown in second
                    },
                    success: function (data) {

                        $("#cod_ciud").html(data);
                        
                    }
                });
            

        }
       

    </script>

@endsection