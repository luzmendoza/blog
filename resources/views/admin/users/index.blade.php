@extends('admin.layout')

@section('header')
<h1>
        Usuarios
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
      </ol>
@stop

@section('content')

	 <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de Usuarios</h3>
              @can('create', $users->first())
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">
                  <i class="fa fa-plus"></i> Crear Usuario
                </a>
              @endcan
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="users-table" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Nombre</th>
	                  <th>Email</th>
                    <th>Roles</th>
	                  <th>Acciones</th>
	                </tr>
                </thead>

				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{  $user->id }}</td>
							<td>{{  $user->name }}</td>
							<td>{{  $user->email }}</td>
              <td>{{  $user->getRoleNames()->implode(', ') }}</td>
							<td>
                <!-- target="_blank" esta instruccion abre el link en otra ventana -->
                @can('view', $user)
                  <a href="{{ route('admin.users.show', $user)}}" class="btn btn-xs btn-default">
                    <i class="fa fa-eye"></i>
                  </a>
                @endcan

                @can('update', $user)
  								<a href="{{ route('admin.users.edit', $user)}}" class="btn btn-xs btn-info">
                    <i class="fa fa-pencil"></i>
                  </a>
                @endcan

                @can('delete', $user)
                  <form method="POST" 
                        action="{{ route('admin.users.destroy', $user)}}" 
                        style="display: inline;">
                    {{ method_field('DELETE')}}
                    @csrf
                    <button class="btn btn-xs btn-danger" 
                        onclick="return confirm('¿Estas seguro de eliminar este usuario?')">
                      <i class="fa fa-times"></i>
                    </button>
                  </form>
                @endcan
								
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
    $('#posts-table').DataTable({
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