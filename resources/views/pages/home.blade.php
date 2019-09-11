
@extends('layout')

<style type="text/css">
  .categoria a{
    color: inherit;font-size: inherit;
  }
</style>

@section('content')
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Publicaciones
          @if(isset($filtro))
          <br>
            <small>todo sobre {{ $filtro->name }}</small>
          @endif
        </h1>

        <!-- Blog Post -->
        @foreach($posts as $post)
          <div class="card mb-4">
            <!--<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">-->
            @include('includes.photospost')

            <div class="card-body">
              <h2 class="card-title">{{ $post->title}}</h2>
              <p class="card-text">{{ $post->except}} </p> 
              <a href="{{ route('posts.show', $post->url )}}" class="btn btn-primary">Leer más &rarr;</a>
              <p class="card-text categoria" align="right">
                <a href="{{ route('categories.show', $post->category )}}"> {{ $post->category->name}} </a> 
              </p>
              @foreach($post->tags as $tag)
                <span class="card-text categoria" align="right">
                  <a href="{{ route('tags.show', $tag )}}">#{{ $tag->name}}</a> 
                </span>
              @endforeach
            </div>
            <div class="card-footer text-muted">
              Publicado el {{ $post->published_at->format('M d')}} por
              <a href="#">{{ $post->owner->name }}</a>
            </div>
          </div>
        @endforeach

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <!---<li class="page-item">
            <a class="page-link" href="#">&larr; Antiguos</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Nuevos &rarr;</a>
          </li>-->
          {{ $posts->links()}}
        </ul>

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

 @stop