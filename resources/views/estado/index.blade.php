@extends('template.index')


@section('title')
    Tipos Estado Unidad
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css')}}">

@endsection

@section('content')
  {!! Form::open(['route' => 'estado.create' , 'method' => 'GET' ,'id' =>'createR'])!!}
                              <button type="submit" class="btn btn-primary"  style="display:none">
                                   <span class="fa fa-plus-circle" aria-hidden="true"> </span>
                                </button>  
                              {!! Form::close() !!}

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Tipos Estado Unidad</h1>               
                    </div>
                </div>
            </div>
        </div>


        <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-12 "> 
                     

    <div class="box-body table-responsive no-padding">
        <table id='datainfo' class="table table-bordered table-hover">
            <thead>
                <th>ID</th>
                <th>Estado</th>
                <th>Acción</th>
            </thead>
            <tbody>
                @if($datos != null)
                    @foreach($datos as $dato)
                        <tr>
           
                            <td>{{ $dato->id}} </td>
                            <td>{{ $dato->estado}} </td> 
                            <td>
                                   <a href="{{ route('estado.edit', $dato->id) }}"  class="btn btn-warning fa fa-pencil" title="Editar Registro"></a>
                                <a href="{{ route('estado.destroy', $dato->id)}}" class="btn btn-danger fa fa-times" title="Eliminar Registro" onclick ="return confirm('Desea eliminar el registro seleccionado?')"></a> 
                            </td>       
                         
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


                    </div>    
                </div>
               
            </div>
        </div>
 
@endsection

@section('js')

<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js')}}"></script>

<script type="text/javascript">
    
$(function () {
    $('#datainfo').removeAttr('width').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      dom: 'Bfrtip',
      buttons: [
            {
                text: '<span class="fa fa-plus-circle" aria-hidden="true"> </span>',
                titleAttr: 'Añadir',
                action: function ( e, dt, node, config ) {
                    $( "#createR" ).submit();
                }
                
            }
        ],
         "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "Sin resultados",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtro desde _MAX_ total registros)",
            "search": "Buscar",
            "showing":"Mostrando"
        },
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns: true
    });
 });
</script>

@endsection