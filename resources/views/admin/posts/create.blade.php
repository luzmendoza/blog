<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.posts.store', '#create')}}">
     @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agrega el titulo de la publicación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
             <!--- <label>Titulo de la publicación</label>-->
              <input id="post_title" type="" name="title" value="{{old('title')}}" class="form-control" placeholder="Ingresa el titulo" autofocus required>
              {!! $errors->first('title', '<span class="help-block">
                :message
              </span>') !!}
              
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  class="btn btn-primary">Crear Publicación</button>
        </div>
      </div>
    </div>
</form>
</div>

@push('scripts')
<script type="text/javascript">
  //validar si hay un # en la url
  if (window.location.hash === '#create') {
    $("#exampleModal").modal('show');
  }

  $("#exampleModal").on('hide.bs.modal', function(){
    window.location.hash = '#';
  });

   $("#exampleModal").on('shown.bs.modal', function(){
      $("#post_title").focus();
       window.location.hash = '#create';
  });
</script>
@endpush