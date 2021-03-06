@extends('layout')


@section('content')

 <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Servicios
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('pages.home')}}">Inicio</a>
      </li>
      <li class="breadcrumb-item active">Servicios</li>
    </ol>

    <!-- Image Header -->
    <img class="img-fluid rounded mb-4" src="http://placehold.it/1200x300" alt="">

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Consulta Nutricional</h4>
          <div class="card-body">
            <p class="card-text">Consulta nutricional personalizada en las instalaciones de CEN</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Leer más</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Consulta Empresarial</h4>
          <div class="card-body">
            <p class="card-text">Consulta nutricional a personal de empresas.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Comedor en tu empresa</h4>
          <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


 @stop


