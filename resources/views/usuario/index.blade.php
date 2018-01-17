@extends('template.index')


@section('title')
    Usuarios
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css')}}">

@endsection



@section('content')
  {!! Form::open(['route' => 'usuario.create' , 'method' => 'GET' ,'id' =>'createR'])!!}
                              <button type="submit" class="btn btn-primary"  style="display:none">
                                   <span class="fa fa-plus-circle" aria-hidden="true"> </span>
                                </button>  
                              {!! Form::close() !!}

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Usuarios</h1>               
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
                <th>Entidad</th>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Pais</th>
                <th>Departamento</th>
                <th>Ciudad</th>
                <th>Dirección</th>\
                <th>Unidad Vivienda</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Perfil</th>

                <th>Estado</th>
                <th>Acción</th>
            </thead>
            <tbody>
                @if($datos != null)
                    @foreach($datos as $dato)
                        <tr>
           
                            <td>{{ $dato->id}} </td>
                            <td>{{ $dato->cod_enti }}</td> 
                            <td>{{ $dato->cod_usua}} </td>  
                            <td>{{ $dato->nom_usua}} </td>  
                            <td>{{ $dato->cod_pais}} </td>  
                            <td>{{ $dato->cod_esta}} </td>  
                            <td>{{ $dato->cod_ciud}} </td>  
                            <td>{{ $dato->dir_usua}} </td>  
                            <td>{{ $dato->uni_vivi}} </td>  
                            <td>{{ $dato->tel_usua}} </td>  
                            <td>{{ $dato->cel_usua}} </td>  
                            <td>{{ $dato->tip_perf}} </td> 
                            <td>
                                   <a href="{{ route('usuario.edit', $dato->id) }}"  class="btn btn-warning fa fa-pencil" title="Editar Registro"></a>
                                <a href="{{ route('usuario.destroy', $dato->id)}}" class="btn btn-danger fa fa-times" title="Eliminar Registro" onclick ="return confirm('Desea eliminar el registro seleccionado?')"></a> 
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