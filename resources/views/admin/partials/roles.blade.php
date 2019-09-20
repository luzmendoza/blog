@foreach($roles as $rol)
	<div class="checkbox">
		<label>
			<input type="checkbox" name="roles[]" value="{{ $rol->name }}"
			{{ $user->roles->contains($rol->id) ? 'checked' : '' }}>
			{{ $rol->name }}
			<br>
			<small class="text-muted">{{ $rol->permissions->pluck('name')->implode(', ') }}</small>
		</label>
	</div>
@endforeach