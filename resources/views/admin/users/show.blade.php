@extends('admin.layout')

@section('content')

	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
	            <div class="box-body box-profile">
	              <img class="profile-user-img img-responsive img-circle" src="{{ asset('adminlte/img/user4-128x128.jpg')}}" alt="{{ $user->name }}">

	              <h3 class="profile-username text-center">{{ $user->name }}</h3>

	              <p class="text-muted text-center">{{  $user->getRoleNames()->implode(', ') }}</p>

	              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
	                </li>
	                <li class="list-group-item">
	                  <b>Publicaciones</b> <a class="pull-right">{{ $user->posts->count() }}</a>
	                </li>
	                @if($user->roles->count())
		                <li class="list-group-item">
		                  <b>Roles</b> <a class="pull-right">{{  $user->getRoleNames()->implode(', ') }}</a>
		                </li>
		            @endif
	              </ul>

	              <a href="{{ route('admin.users.edit' , $user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
	            </div>
            <!-- /.box-body -->
          </div>
		</div>
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Publicaciones</h3>
				</div>
				<div class="box-body">
					@forelse($user->posts as $post)
						<a href="{{ route('posts.show', $post) }}" target="blank">
							<strong>{{ $post->title }}</strong>
						</a>
						<br>
						<small class="text-muted">
							Publicado el {{ $post->published_at->format('d/M/Y') }}
						</small>
						<p class="text-muted">{{ $post->except }}</p>
						@unless($loop->last)
							<hr>
						@endunless
						
					@empty	
						<small class="text-muted">Aun no tiene publicaciones</small>
					@endforelse
				</div>
			</div>	
		</div>
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Roles</h3>
				</div>
				<div class="box-body">
					@forelse($user->roles as $role)
						<strong>{{ $role->name }}</strong>
						@if($role->permissions->count())
							<br>
							<small class="text-muted">
								Permisos: {{ $role->permissions->pluck('name')->implode(', ') }}
							</small>
						@endif

						@unless($loop->last)
							<hr>
						@endunless
					@empty	
						<small class="text-muted"> No tiene roles asignados</small>
						
					@endforelse
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Permisos Adicionales</h3>
				</div>
				<div class="box-body">
					@forelse($user->permissions as $permiso)
						<strong>{{ $permiso->name }}</strong>
						@unless($loop->last)
							<hr>
						@endunless
					@empty	
						<small class="text-muted"> No tiene permisos adicionales</small>
					@endforelse
				</div>
			</div>
		</div>
	</div>

@endsection