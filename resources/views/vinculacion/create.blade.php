@extends('template.index')


@section('title')
    Crear Vinculación
@endsection

@section('content')

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Crear Vinculación</h1>               
                    </div>
                </div>
            </div>
        </div>

        
 
         <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="" id="contact1">                        
                            {!! Form::open(['route' => 'vinculacion.store' , 'method' => 'POST'])!!}
                                <div class="row">
                                 
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm"">
                                            <label for="nom_vinc">Descripcion</label>
                                            <input type="text" class="form-control" name="nom_vinc" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Estado</label>
                                            <select class="form-control" id="ind_esta" name="ind_esta" required">
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

<script type="text/javascript">
    $(document).ready(function(){

    });
</script>

@endsection