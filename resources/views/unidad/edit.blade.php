@extends('template.index')


@section('title')
    Editar Unidad
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
                        <h1 class="page-title">Editar Unidad</h1>               
                    </div>
                </div>
            </div>
        </div>

        
 
         <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="" id="contact1">                        
                            {!! Form::open(['route' => ['unidad.update', $id], 'method' => 'PUT', 'files'=>true]) !!}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="cod_enti">Entidad</label>
                                            <select class="form-control select2" id="cod_enti" name="cod_enti" required">
                                                <option value="cod_enti">seleccione una opcion</option>
                                                @if($entidades != null)
                                                @foreach($entidades as $entidad)
                                                    @if($entidad->id == $dato->cod_enti)
                                                        <option  value="{{$entidad->id}}" selected="selected">{{$entidad->nom_enti}}
                                                        </option>
                                                    @else
                                                        <option  value="{{$entidad->id}}">{{$entidad->nom_enti}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                              @endif                                    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <label for="num_predia">Numero Predial</label>
                                            <input type="text" class="form-control"
                                             name="num_predia" value='{{$dato->num_predia}}' required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tipo_uni">Tipo Unidad</label>
                                            <select class="form-control select2" id="tipo_uni" name="tipo_uni" required ">
                                                <option value="">seleccione una opcion</option>
                                                @if($tipos != null)
                                                @foreach($tipos as $tipo)
                                                    @if($tipo->id == $dato->tipo_uni)
                                                        <option  value="{{$tipo->id}}" selected="selected">{{$tipo->tipo}}
                                                        </option>
                                                    @else
                                                        <option  value="{{$tipo->id}}">{{$tipo->tipo}}
                                                        </option>
                                                    @endif
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
                                                    @if($estado->id == $dato->band_estado)
                                                        <option  value="{{$estado->id}}" selected="selected">{{$estado->estado}}
                                                        </option>
                                                    @else
                                                        <option  value="{{$estado->id}}">{{$estado->estado}}
                                                        </option>
                                                    @endif
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