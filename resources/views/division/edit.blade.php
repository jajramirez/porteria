@extends('template.index')


@section('title')
    Editar División
@endsection

@section('content')

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Editar División</h1>               
                    </div>
                </div>
            </div>
        </div>

        
 
         <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="" id="contact1">                        
                            {!! Form::open(['route' => ['division.update', $id], 'method' => 'PUT'])!!}
                                <div class="row">
                        
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nom_dipo">Descripcion</label>
                                            <input type="text" class="form-control" name="nom_dipo" value="{{$dato->nom_dipo}}" required>
                                            <input type="text" class="form-control" name="id" value="{{$dato->id}}" style="display:none">
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


@endsection