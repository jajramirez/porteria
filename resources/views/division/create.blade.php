@extends('template.index')


@section('title')
    Crear División
@endsection

@section('content')

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Crear División</h1>               
                    </div>
                </div>
            </div>
        </div>

        
 
         <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="" id="contact1">                        
                            {!! Form::open(['route' => 'division.store' , 'method' => 'POST'])!!}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Tipo Regitro</label>
                                            <select class="form-control" id="tip_dipo" name="tip_dipo" required onchange="valida()">
                                              <option value="">seleccione una opcion</option>
                                              <option value="P">Pais</option>
                                              <option value="E">Estado</option>
                                              <option value="C">Ciudad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nom_dipo">Descripcion</label>
                                            <input type="text" class="form-control" name="nom_dipo" required>
                                        </div>
                                    </div>
                                    <div  id='divtam' class="col-sm-6">
                                        <div class="form-group">
                                            <label id="labeldep" for="cod_dest">DE</label>
                                            <select id="selecdep"  class="form-control" name="cod_dest" onchange='cargarestado()'>
                                              <option value="">seleccione una opcion</option>
                                            </select>
                                        </div>
                                    </div>
                                       <div class="col-sm-6">
                                        <div class="form-group">
                                            <label id="labeldep2" for="cod_dest2">DE</label>
                                            <select id="selecdep2"  class="form-control" name="cod_dest2" >
                                              <option value="">seleccione una opcion</option>
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

<script type="text/javascript">
    
    $(document).ready(function(){
          $("#labeldep").hide();
          $("#selecdep").hide();
          $("#labeldep2").hide();
          $("#selecdep2").hide();


    });
    function valida(){
        var valor = $("#tip_dipo").val();
        if(valor == 'P')
        {
            $("#labeldep").hide();
            $("#selecdep").hide();
            $("#labeldep2").hide();
            $("#selecdep2").hide();
            $("#selecdep").removeAttr('required');
            $("#selecdep2").removeAttr('required');

        }
        if(valor == 'E')
        {
            $("#labeldep").show();
            $("#labeldep").html('Pais');
            $("#selecdep").show();
            $("#labeldep2").hide();
            $("#selecdep2").hide();
            $("#selecdep").attr('required', 'required');

        }
        if(valor == 'C')
        {
            $("#labeldep").show();
            $("#labeldep").html('Pais');
            $("#selecdep").show();
            $("#labeldep2").show();
            $("#selecdep2").show();
            $("#labeldep2").html('Estado');
            $("#selecdep").attr('required', 'required');
            $("#selecdep2").attr('required', 'required');
        }
        cargarpais();
    }


    function cargarpais()
    {
        $("#selecdep").html('<option value="">seleccione una opcion</option>');
        $("#selecdep2").html('<option value="">seleccione una opcion</option>');

        var valor = $("#tip_dipo").val();
        var PostUri = "{{ route('division.datos')}}"; 

        if(valor == 'E' || valor == 'C')
        {
          
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
                 
                    
                    $("#selecdep").html(data);
                    }
            });
        }

    }

     function cargarestado()
    {

      
        $("#selecdep2").html('<option value="">seleccione una opcion</option>');

        var valor = $("#tip_dipo").val();
        var PostUri = "{{ route('division.datos')}}"; 
        var pais = $("#selecdep").val();

        if( valor == 'C')
        {
          
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
                 
                  

                    $("#selecdep2").html(data);
                    
                }
            });
        }

    }
</script>

@endsection