 @extends('layout')


@section('content')


 <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">404
      <small>Pagina no encontrada</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('pages.home')}}">Inicio</a>
      </li>
      <li class="breadcrumb-item active">404</li>
    </ol>

    <div class="jumbotron">
      <h1 class="display-1">404</h1>
      <p>La página que estas buscando no pudo ser encontrada. Aqui hay algunos links de ayuda para que puedas regresar:</p>
      <ul>
        <li>
          <a href="{{ route('pages.home')}}">Inicio</a>
        </li>
        <li>
          <a href="{{ route('pages.about')}}">Nosotros</a>
        </li>
        <li>
          <a href="{{ route('pages.services')}}">Servicios</a>
        </li>
        <li>
          <a href="{{ route('pages.contact')}}">Contacto</a>
        </li>
       
      </ul>
    </div>
    <!-- /.jumbotron -->

  </div>
  <!-- /.container -->


 @stop