@extends('layout')


@section('content')

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Nosotros
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('pages.home')}}">Inicio</a>
      </li>
      <li class="breadcrumb-item active">Nosotros</li>
    </ol>

    <!-- Intro Content -->
    <div class="row">
      <div class="col-lg-6">
        <img class="img-fluid rounded mb-4" src="http://placehold.it/750x450" alt="">
      </div>
      <div class="col-lg-6">
        <h2>Centro de Educación Nutricional</h2>
        <p>Centro especializado en nutrición</p>
        <p>Ayuda psicologica y deportiva</p>
        <p>Contamos con expertos</p>
      </div>
    </div>

<hr>
	<!-- /.row -->
	<div class="row">
      <div class="col-lg-12">
        <h2>Mision</h2>
        <p>Tener un mundo mas saludable</p>
      </div>
    </div>

<hr>    
    <!-- /.row -->
	<div class="row">
      <div class="col-lg-12">
        <h2>Vision</h2>
        <p>Tener un mundo mas saludable</p>
      </div>
    </div>

<hr>
    <!-- /.row -->

    <!-- Team Members -->
    <h2>Nuestro Equipo</h2>

    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="http://placehold.it/750x450" alt="">
          <div class="card-body">
            <h4 class="card-title">Joel Salazar</h4>
            <h6 class="card-subtitle mb-2 text-muted">Fundador</h6>
            <p class="card-text">Licenciado en Nutrición por la Universidad de Durango.</p>
          </div>
          <div class="card-footer">
            <a href="#">joelsalazar118@gmail.com</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="http://placehold.it/750x450" alt="">
          <div class="card-body">
            <h4 class="card-title">Team Member</h4>
            <h6 class="card-subtitle mb-2 text-muted">Position</h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
          </div>
          <div class="card-footer">
            <a href="#">name@example.com</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="http://placehold.it/750x450" alt="">
          <div class="card-body">
            <h4 class="card-title">Team Member</h4>
            <h6 class="card-subtitle mb-2 text-muted">Position</h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
          </div>
          <div class="card-footer">
            <a href="#">name@example.com</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Our Customers -->
    <h2>Nuestros Clientes</h2>
    <div class="row">
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->




 @stop

