@extends('template.index')


@section('title')
    Crear Unidad
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
                        <h1 class="page-title">Crear Unidad</h1>               
                    </div>
                </div>
            </div>
        </div>

        
 
         <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="" id="contact1">                        
                            {!! Form::open(['route' => 'unidad.store' , 'method' => 'POST'])!!}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="cod_enti">Entidad</label>
                                            <select class="form-control select2" id="cod_enti" name="cod_enti" required">
                                                <option value="">seleccione una opcion</option>
                                                @if($entidades != null)
                                                    @foreach($entidades as $entidad)
                                                      <option value="{{$entidad->id}}">{{$entidad->nom_enti}}</option>
                                                    @endforeach
                                                @endif                                         
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="num_predia">Numero Predial</label>
                                            <input type="text" class="form-control"
                                             name="num_predia" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tipo_uni">Tipo Unidad</label>
                                            <select class="form-control select2" id="tipo_uni" name="tipo_uni" required ">
                                                <option value="">seleccione una opcion</option>
                                                @if($tipos != null)
                                                    @foreach($tipos as $tipo)
                                                      <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                                    @endforeach
                                                @endif                                         
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="band_estado">Estado</label>
                                            <select class="form-control select2" id="band_estado" name="band_estado" required ">
                                                <option value="">seleccione una opcion</option>
                                                @if($estados != null)
                                                    @foreach($estados as $estado)
                                                      <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                                    @endforeach
                                                @endif                                         
                                            </select>
                                        </div>
                                    </div
                                    
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

    });


    $(".select2").select2();

</script>

@endsection