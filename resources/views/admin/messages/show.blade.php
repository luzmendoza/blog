@extends('admin.layout')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
	            <div class="box-body">

	              <form method="POST" action="{{ route('admin.messages.update', $message) }}">
					{{ method_field('PUT') }}
					@csrf
					<div class="form-group">
						<label for="name">Nombre:</label>
						<input type="text" name="name" value="{{ $message->name}}" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="name">Telefono:</label>
						<input type="text" name="name" value="{{ $message->phone}}" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" value="{{$message->email}}" class="form-control" readonly>
					</div>

					<div class="form-group">
						<label for="message">El mensaje:</label>
						<textarea name="message"  class="form-control" readonly rows="10">
							{{ $message->message}}
						</textarea>
					</div>
					<div class="form-group">
						<select name="status" class="form-control select2">
							<option value="Nuevo" {{ $message->status == 'Nuevo' ? 'selected' : ''}}>
									Nuevo
							</option>
							<option value="Leido" {{ $message->status == 'Leido' ? 'selected' : ''}}>
								Leido
							</option>
							<option value="Contactado" {{ $message->status == 'Contactado' ? 'selected' : ''}}>
								Contactado
							</option>
						</select>
					</div>

					<button class="btn btn-primary btn-block">Cambiar Estatus</button>
				</form>
	            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>

@endsection