@extends('template.index')


@section('title')
    Crear Entidad
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
                        <h1 class="page-title">Crear Entidad</h1>               
                    </div>
                </div>
            </div>
        </div>

        
 
         <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="" id="contact1">                        
                            {!! Form::open(['route' => 'entidad.store' , 'method' => 'POST', 'files'=>true]) !!}

                                <div class="row">
                                  
                                    <div class="col-sm-12">
                                        <div class="form-group input-group-sm">
                                            <label for="nom_enti">Nombre *</label>
                                            <input type="text" class="form-control" name="nom_enti" required>
                                        </div>
                                    </div>
                                    <div  class="col-sm-4">
                                        <div class="form-group input-group-sm">
                                            <label  for="cod_pais">Pais *</label>
                                            <select id="cod_pais"  class="form-control select2" 
                                            name="cod_pais" onchange='cargarestado()' required>
                                              <option value="">seleccione una opcion</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-sm-4">
                                        <div class="form-group input-group-sm">
                                            <label  for="cod_estado">Departamento *</label>
                                            <select id="cod_estado"  class="form-control select2" name="cod_estado" onchange='cargarciudad()' required>
                                              <option value="">seleccione una opcion</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group input-group-sm">
                                            <label  for="cod_ciud">Ciudad *</label>
                                            <select id="cod_ciud"  class="form-control select2" name="cod_ciud" required>
                                              <option value="">seleccione una opcion</option>
                                            </select>
                                        </div>
                                    </div>
  
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="nom_enti">Direccion</label>
                                            <input type="text" class="form-control" name="dir_enti" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="tel_enti">Telefono</label>
                                            <input type="text" class="form-control" name="tel_enti" >
                                        </div>
                                    </div>
                                     <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="cel_enti">Celular</label>
                                            <input type="text" class="form-control" name="cel_enti" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="cor_enti">Correo Institucional *</label>
                                            <input type="email" class="form-control" name="cor_enti" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm" >
                                            <label for="nom_repr">Nombre Representante</label>
                                            <input type="text" class="form-control" name="nom_repr" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="tel_repr">Telefono Representante</label>
                                            <input type="text" class="form-control" name="tel_repr" >
                                        </div>
                                    </div>
                                    <div  class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label  for="tip_vinc">Tipo Vinculacion *</label>
                                            <select id="tip_vinc"  class="form-control select2" 
                                            name="tip_vinc" onchange='cargarestado()' required>
                                              <option value="">seleccione una opcion</option>
                                              @if($tipvinc != null)
                                                @foreach($tipvinc as $v)
                                                    <option  value="{{$v->id}}">{{$v->nom_vinc}}</option>
                                                @endforeach
                                              @endif
                                            </select>
                                        </div>
                                    </div>
                                      <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="fec_vinv">Fecha vinculacion</label>
                                            <input id="fec_vinv" type="text" class="form-control" name="fec_vinv" >
                                        </div>
                                    </div>
                                      <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="fec_expl">Fecha Expiracion</label>
                                            <input type="text" class="form-control"  id="fec_expl" name="fec_expl" >
                                        </div>
                                    </div>
                                      <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="dir_logo">Logo</label>
                                            <input type="file" class="form-control" name="dir_logo" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label  for="ind_esta">Estado *</label>
                                            <select  class="form-control select2" name="ind_esta" required>
                                              <option value="">seleccione una opcion</option>
                                              <option value="A">Activo</option>
                                              <option value="I">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary">Registrar</button>
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
            cargarpais();
        });

            $('#fec_vinv').datepicker({
        autoclose: true
        });
        $('#fec_expl').datepicker({
            autoclose: true
        });
        
        $(".select2").select2();

       

        function cargarpais()
        {

            var PostUri = "{{ route('division.datos')}}"; 

                $.ajax({
                    url: PostUri,
                    type: 'post',
                    data: {
                        cargar: 'P'
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ Session::token() }}", //for object property name, use quoted notation shown in second
                    },
                    success: function (data) {
                     
                        
                        $("#cod_pais").html(data);
                    }
                });
            

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