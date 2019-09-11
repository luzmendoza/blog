<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('pages.home')}}">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ setActiveRoute('pages.home') }}">
            <a class="nav-link" href="{{ route('pages.home')}}">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item {{ setActiveRoute('pages.about') }} ">
            <a class="nav-link" href="{{ route('pages.about')}}">Nosotros</a>
          </li>
          <li class="nav-item {{ setActiveRoute('pages.services') }}">
            <a class="nav-link" href="{{ route('pages.services')}}">Servicios</a>
          </li>
          <li class="nav-item {{ setActiveRoute('pages.contact') }}">
            <a class="nav-link" href="{{ route('pages.contact')}}">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
