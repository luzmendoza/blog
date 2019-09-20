@csrf
<div class="form-group">

	<label for="name">Identificador:</label>
	@if($role->exists)
		<input type="text" value="{{ $role->name}}" class="form-control" disabled>
	@else
		<input type="text" name="name" value="{{ old('name',$role->name) }}" class="form-control">
	@endif
</div>
<div class="form-group">
	<label for="display_name">Nombre:</label>
	<input type="text" name="display_name" value="{{ old('display_name', $role->display_name)}}" class="form-control">
</div>
<!--
<div class="form-group">
	<label for="email">Guard:</label>
	<select class="form-control" name="guard_name" >
		@foreach(config('auth.guards') as $guardName => $guard)
			<option value="{{ $guardName }}" {{ old('guard_name', $role->guard_name) === $guardName ? 'selected' : '' }} >{{ $guardName }}</option>
		@endforeach
	</select>
</div>
-->
<div class="form-group col-md-6">
	<label>Permisos</label>
	@include('admin.partials.permissions', ['model' => $role])
</div>