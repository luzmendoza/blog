@extends('admin.layout')

@section('header')
<h1>
        Mensajes
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Mensajes</li>
      </ol>
@stop

@section('content')

	 <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de Mensajes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="messages-table" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Enviado por:</th>
	                  <th>Telefono</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
	                  <th>Acciones</th>
	                </tr>
                </thead>

				<tbody>
					@foreach($messages as $message)
						<tr>
							<td>{{  $message->id }}</td>
							<td>{{  $message->name }}</td>
							<td>{{  $message->phone }}</td>
              <td>{{  $message->status }}</td>
              <td>{{  $message->created_at }}</td>
							<td>
                <!-- target="_blank" esta instruccion abre el link en otra ventana -->
                <a href="{{ route('admin.messages.show', $message)}}" class="btn btn-xs btn-default"
                target="_blank" 
                >
                  <i class="fa fa-eye"></i>
                </a>

								{{-- <a href="{{ route('admin.messages.edit', $message)}}" class="btn btn-xs btn-info">
                  <i class="fa fa-pencil"></i>
                </a> --}}

                <form method="POST" 
                      action="{{ route('admin.messages.destroy', $message)}}" 
                      style="display: inline;">
                  {{ method_field('DELETE')}}
                  @csrf
                  <button class="btn btn-xs btn-danger" 
                      onclick="return confirm('¿Estas seguro de eliminar este mensaje?')">
                    <i class="fa fa-times"></i>
                  </button>
                </form>

								
							</td>
						</tr>
					@endforeach
				</tbody>

				<!--
                <tbody>
	                <tr>
	                  <td>Trident</td>
	                </tr>
                </tbody>
				
                <tfoot>
	                <tr>
	                  <th>Rendering engine</th>
	                  <th>Browser</th>
	                  <th>Platform(s)</th>
	                  <th>Engine version</th>
	                  <th>CSS grade</th>
	                </tr>
                </tfoot>
                -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

@stop

@push('styles')
	 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script type="text/javascript">
	$(function () {
    $('#messages-table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endpush