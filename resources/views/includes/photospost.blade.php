@if($post->photos->count() === 1) <!---MUESTRA UNA FOTO-->
    <img class="card-img-top" src="{{ asset($post->photos->first()->url) }}" alt="{{$post->title}}"height="300" width="750">
@elseif($post->photos->count() > 1) <!---MUESTRA UN CARRUSEL DE FOTOS, ESTA INCLUIDO EN OTRO ARCHIVO-->
  	@include('includes.carruselpost')
@elseif($post->iframe)  <!--MUESTRA VIDEOS O SONIDO-->
  <div class="embed-responsive embed-responsive-21by9">
      {!! $post->iframe !!}
  </div>
@endif