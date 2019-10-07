<template>
	<!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">404
      <small>Pagina no encontrada</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Inicio</a>
      </li>
      <li class="breadcrumb-item active">404</li>
    </ol>

    <div class="jumbotron">
      <h1 class="display-1">404</h1>
      <p>La página que estas buscando no pudo ser encontrada.</p>
      <p><router-link :to="{name: 'home'}" class="nav-link">Inicio</router-link></p>
    </div>
    <!-- /.jumbotron -->

  </div>
  <!-- /.container -->
</template>