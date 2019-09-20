@foreach($permissions as $permiso)
	<div class="checkbox">
		<label>
			<input type="checkbox" name="permissions[]" value="{{ $permiso->name }}"
			{{ $model->permissions->contains($permiso->id) || collect(old('permissions'))->contains($permiso->name) ? 'checked' : '' }}>
			{{ $permiso->name }}
		</label>
	</div>
@endforeach