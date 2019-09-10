@extends('admin.layout')

@section('header')
<h1>
        Posts
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>
@stop

@section('content')

	 <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de Publicaciones</h3>
              <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Nuevo
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Titulo</th>
	                  <th>Extracto</th>
	                  <th>Acciones</th>
	                </tr>
                </thead>

				<tbody>
					@foreach($posts as $post)
						<tr>
							<td>{{  $post->id }}</td>
							<td>{{  $post->title }}</td>
							<td>{{  $post->except }}</td>
							<td>
                <!-- target="_blank" esta instruccion abre el link en otra ventana -->
                <a href="{{ route('posts.show', $post)}}" class="btn btn-xs btn-default"
                target="_blank" 
                >
                  <i class="fa fa-eye"></i>
                </a>

								<a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-xs btn-info">
                  <i class="fa fa-pencil"></i>
                </a>

                <form method="POST" 
                      action="{{ route('admin.posts.destroy', $post)}}" 
                      style="display: inline;">
                  {{ method_field('DELETE')}}
                  @csrf
                  <button class="btn btn-xs btn-danger" 
                      onclick="return confirm('¿Estas seguro de eliminar esta publicación?')">
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