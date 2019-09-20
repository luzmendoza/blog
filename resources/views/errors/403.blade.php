 @extends('layout')


@section('content')


 <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">403
      <small>Página no autorizada</small>
    </h1>

    <div class="jumbotron">
      <span style="color: red">{{ $exception->getMessage() }}</span>
      <ul>
        <li>
          <a href="{{ url()->previous() }}">Regresar</a>
        </li>
       
      </ul>
    </div>
    <!-- /.jumbotron -->

  </div>
  <!-- /.container -->


 @stop