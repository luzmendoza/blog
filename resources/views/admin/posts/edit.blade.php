@extends('admin.layout')

@section('header')
<h1>
        Posts
        <small>Editar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{route('admin.posts.index')}}"><i class="fa fa-th"></i> Posts</a></li>
        <li class="active">Editar</li>
      </ol>
@stop


@section('content')

<div class="row">

	@if($post->photos->count())
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					@foreach($post->photos as $photo)
						<form method="POST" action="{{ route('admin.photos.destroy',$photo)}}">
							{{ method_field('DELETE')}}
							@csrf
							<div class="col-md-2">
								<button class="btn btn-danger btn-xs" style="position: absolute;">
									<i class="fa fa-remove"></i>
								</button>
								<img src="{{ asset($photo->url)}}" class="img-responsive" alt="{{$post->title}}" height="150" width="150">
							</div>
						</form>
		          	@endforeach
							
				</div>
			</div>
		</div>
	@endif

	<form method="POST" action="{{ route('admin.posts.update', $post)}}">
		 @csrf
		 {{ method_field('PUT')}}
		<div class="col-md-8">
			<div class="box box-primary">
				
					<div class="box-body">
						<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
							<label>Titulo de la publicación</label>
							<input type="" name="title" value="{{old('title', $post->title)}}" class="form-control" placeholder="Ingresa el titulo">
							{!! $errors->first('title', '<span class="help-block">
								:message
							</span>') !!}
							
						</div>
						
						<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
							<label>Contenido de la publicación</label>
							<textarea class="form-control" id="editor" name="body" placeholder="Ingresa el contenido completo de la publicación" rows="10">{{old('body', $post->body)}}</textarea> 
							{!! $errors->first('body', '<span class="help-block">
								:message
							</span>') !!}
						</div>

						<div class="form-group {{ $errors->has('iframe') ? 'has-error' : ''}}">
							<label>Contenido embebido (iframe)</label>
							<textarea class="form-control" id="editor" name="iframe" placeholder="Ingresa el contenido embebido de audio o video" rows="2">{{old('iframe', $post->iframe)}}</textarea> 
							{!! $errors->first('iframe', '<span class="help-block">
								:message
							</span>') !!}
						</div>

					</div>
				
			</div>
		</div>

		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					  <div class="form-group">
		                <label>Date:</label>

		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" id="datepicker" 
		                  value="{{old('published_at',$post->published_at ? $post->published_at->format('m/d/Y') : '')}}" name="published_at">
		                </div>
		                <!-- /.input group -->
		              </div>

					<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
						<label>Categoria</label>
						<select name="category_id" class="form-control select2">
							<option value="">Seleccione una categoria</option>
							@foreach($categories as $categoria)
								<option value="{{$categoria->id}}" {{ old('category_id', $post->category_id) == $categoria->id ? 'selected' : ''}}>
									{{ $categoria->name}}
								</option>
							@endforeach
						</select>
						{!! $errors->first('category_id', '<span class="help-block">
								:message
							</span>') !!}
					</div>

					 <div class="form-group">
		                <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Seleccione una o más etiquetas"
		                        style="width: 100%;">
		                        @foreach($tags as $tag)
		                 			 <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id}}">
		                 			 	{{$tag->name}}
		                 			 </option>
		                  		@endforeach
		                </select>
		              </div>

					<div class="form-group {{ $errors->has('except') ? 'has-error' : ''}}">
						<label>Extracto de la publicación</label>
						<textarea class="form-control" name="except" placeholder="Ingrese el extracto de la publicación" value="old('except')">{{old('except', $post->except)}}</textarea> 
						{!! $errors->first('except', '<span class="help-block">
								:message
							</span>') !!}
					</div>

					<div class="form-group"> 
						<div class="dropzone clsbox" id="mydropzone">
							
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	
</div>
@stop


@push('styles')
	
	
 	<!-- Select2 -->
  	 <link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}">
	<!-- bootstrap datepicker -->
 	 <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
 	 <!--dropzone-->
	 <link rel="stylesheet" href="{{ asset('css/dropzone.css')}}">
@endpush

@push('scripts')

	
	<!-- CK Editor -->
	<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
	<!-- Select2 -->
	<script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<!-- bootstrap datepicker -->
	<script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<!-- CK Editor 
	<script src="{{ asset('adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>-->
	<!--dropzone-->
	<script src="{{ asset('js/dropzone.js')}}"></script>
	
	<script type="text/javascript">
		$('#datepicker').datepicker({
		      autoclose: true
		    })

		 CKEDITOR.replace('editor')
		 CKEDITOR.config.height = 290;

		 //Initialize Select2 Elements
    	$('.select2').select2({
    		tags: true  //crear elementos sobre la marcha
    	});

    	//dropzone.. subir imagenes
    	Dropzone.autoDiscover = false;
    	var myDropzone = new Dropzone("div#mydropzone", {
    		url: '<?php echo(asset('/admin/posts/'.$post->url.'/photos')) ?>',
    		acceptedFiles: 'image/*',
    		paramName: 'photo',
    		maxFilesize: 2, //tamaño del archivo 2M
    		headers: {
    			'X-CSRF-TOKEN': '{{ csrf_token() }}'
    		},
    		dictDefaultMessage:'Arrastra las imagenes aqui',
    	});

    	myDropzone.on('error', function(file, res){
    		console.log(res.errors.photo[0]);
    		var msg = res.errors.photo[0];//respuesta del servidor
    		$('.dz-error-message:last > span').text(msg);//actualiza el span con esa clase
    	});
    	
	</script>
@endpush