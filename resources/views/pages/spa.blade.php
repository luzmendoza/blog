
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--description para CEO, longitud entre 150-160 caracteres incluidos espacios-->
  <meta name="description" content="@yield('meta_description','Blog de nutrición')">
  <meta name="author" content="Luz Mendoza">
<!--title para CEO, longitud menos de 60 caracteres incluidos espacios-->
  <title>@yield('meta_title', config('app.name') . " | Blog")</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

   <!-- Custom styles for this template -->
  <link href="{{ asset('css/modern-business.css')}}" rel="stylesheet">

  <!-- Custom styles for other template -->
  @stack('styles')
  
  <style type="text/css">
    .categoria a{
      color: inherit;font-size: inherit;
    }

    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
      opacity: 0;
    }
  </style>

</head>

<body>

<div id="app"><!--creacion de vue-->

  <!-- Navigation -->
  <nav-bar></nav-bar>

  <transition name="fade"><!--aplica clases para transiciones animadas-->
    <!--CONTENT SECTION--> <!--con el key forza a renderizar el componente-->
    <router-view :key="$route.fullPath"></router-view>
  </transition>

   <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; CEN 2019</p>
    </div>
    <!-- /.container -->
  </footer>

</div><!--DIV DEL VUE-->  

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
  <!-- Custom scripts for other template -->
  @stack('scripts')



  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


</body>

</html>

