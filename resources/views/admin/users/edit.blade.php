@extends('admin.layout')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Datos Personales</h3>
			</div>
			<div class="box-body">

				<!---mostrar una lista de errores-->
				@include('admin.partials.error-messages')
				
				<form method="POST" action="{{ route('admin.users.update', $user) }}">
					{{ method_field('PUT') }}
					@csrf
					<div class="form-group">
						<label for="name">Nombre:</label>
						<input type="text" name="name" value="{{ old('name',$user->name)}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" value="{{ old('email',$user->email)}}" class="form-control">
					</div>

					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input type="password" name="password"  class="form-control" placeholder="Contraseña">
						<span class="help-block">Dejar en blanco si no quiere cambiar la contraseña</span>
					</div>

					<div class="form-group">
						<label for="password_confirmation">Confirmar contraseña:</label>
						<input type="password" name="password_confirmation"  class="form-control" placeholder="Confirmar contraseña">

					</div>

					<button class="btn btn-primary btn-block">Actualizar</button>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Roles</h3>
			</div>
			<div class="box-body">
				<!--Directiva role es del paquete laravel permission-->
				@role('Admin')
					<form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
						{{ method_field('PUT') }}
						@csrf
						@include('admin.partials.roles')
						<button class="btn btn-primary btn-block">Actualizar Roles</button>
					</form>
				@else
					<ul class="list-group">
						@forelse($user->roles as $role)
							<li class="list-group-item">{{ $role->name }}</li>
						@empty
							<li class="list-group-item">No tiene ningún rol</li>
						@endforelse
					</ul>
				@endrole
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Permisos Adicionales</h3>
			</div>
			<div class="box-body">
				<!--Directiva role es del paquete laravel permission-->
				@role('Admin')
					<form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
						{{ method_field('PUT') }}
						@csrf
						@include('admin.partials.permissions', ['model' => $user])
						<button class="btn btn-primary btn-block">Actualizar Permisos</button>
					</form>
				@else
					<ul class="list-group">
						@forelse($user->permissions as $permission)
							<li class="list-group-item">{{ $permission->name }}</li>
						@empty
							<li class="list-group-item">No tiene permisos</li>
						@endforelse
					</ul>
				@endrole
			</div>
		</div>
	</div>
</div>
	

@endsection