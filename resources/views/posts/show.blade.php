@extends('layout')

@push('styles')
<link href="{{ asset('css/blog-post.css" rel="stylesheet')}}">
@endpush

@section('meta_title', $post->title)
@section('meta_description', $post->except)

@section('content')
	
	  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">Start Bootstrap</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{ $post->published_at->format('M d')}}</p>

        <hr>

        <!-- Preview Image 
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
        -->
        @if($post->photos->count() === 1)<!--MUESTRA UNA FOTO-->
          <img class="card-img-top" src="{{ asset($post->photos->first()->url) }}" alt="{{$post->title}}"height="300" width="900">
        @elseif($post->photos->count() > 1)<!--MUESTRA UN CARRUSEL DE FOTOS-->
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              @foreach($post->photos as $photo)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
              @endforeach
            </ol>

            <div class="carousel-inner">
              @foreach($post->photos as $photo)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}"><!--$loop->iteration === 1-->
                  <img src="{{ asset($photo->url)}}" class="d-block w-100" alt="{{$post->title}}" height="300" width="900">
                </div>
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        @elseif($post->iframe)  <!--VIDEOS-->
          <div class="embed-responsive embed-responsive-21by9">
              {!! $post->iframe !!}
          </div>
        @endif



        <hr>

        <!-- Post Content -->
       	{!! $post->body !!} <!--Usar esta sintaxis para cuando incrusto html desde bd-->

        <hr>
			<blockquote class="blockquote">
	          <footer class="blockquote-footer">
	          		{{ $post->category->name}}

					@foreach($post->tags as $tag)
		                <cite title="Etiquetas">#{{ $tag->name}}</cite>
		              @endforeach
	          </footer>
	        </blockquote>

			 <!-- Redes Sociales-->
			<blockquote class="blockquote" align="right">
			 	<a href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullurl()}}&title={{$post->title }} " title="Compartir en Facebook" target="_blank">
          <img alt="Compartir en Facebook" src="{{ asset('img/flat_web_icon_set/Facebook.png')}}">
        </a>
			 	<a href="https://twitter.com/intent/tweet?url={{ request()->fullurl() }}&text={{$post->title }}&via=CENMX&hashtags=CEN" target="_blank" title="Tweet">
          <img alt="Tweet" src="{{ asset('img/flat_web_icon_set/Twitter.png')}}">
        </a>	
			 	<a href="https://plus.google.com/share?url={{request()->fullurl()}}" target="_blank" title="Compartir en Google+">
	        <img alt="Compartir en Google+" src="{{ asset('img/flat_web_icon_set/Google+.png')}}">
        </a>
	      <a href="http://pinterest.com/pin/create/button/?url={{request()->fullurl()}}&description={{$post->title }}" target="_blank" title="Pin it">
          <img alt="Pin it" src="{{ asset('img/flat_web_icon_set/Pinterest.png')}}">
        </a>
	        </blockquote>
        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        @include('includes.widgetCategory')

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


@endsection