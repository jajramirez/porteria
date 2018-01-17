@extends('template.index')


@section('title')
    Editar Vinculación
@endsection

@section('content')

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Editar Vinculación</h1>               
                    </div>
                </div>
            </div>
        </div>

        
 
         <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="" id="contact1">                        
                           {!! Form::open(['route' => ['vinculacion.update', $id], 'method' => 'PUT'])!!}
                                <div class="row">
                                 
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm"">
                                            <label for="nom_vinc" >Descripción *</label>
                                            <input type="text" class="form-control" name="nom_vinc" value="{{$dato->nom_vinc}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label  for="ind_esta">Estado *</label>
                                            <select  class="form-control select2" name="ind_esta" required>
                                                <option value="">seleccione una opcion</option>
                                                    @if($dato->ind_esta == "A")
                                                        <option value="A" selected="selected">Activo</option>
                                                        <option value="I">Inactivo</option>
                                                    @endif
                                                    @if($dato->ind_esta == "I")
                                                        <option value="A" >Activo</option>
                                                        <option value="I" selected="selected">Inactivo</option>
                                                    @endif
                                                    @if($dato->ind_esta == null)
                                                        <option value="A">Activo</option>
                                                        <option value="I">Inactivo</option>
                                                    @endif
                                            </select>
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

<script type="text/javascript">
    $(document).ready(function(){

    });
</script>

@endsection