 <template>
   
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <router-link :to="{name: 'home'}" class="navbar-brand">CEN</router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link :to="{name: 'home'}" class="nav-link">Inicio</router-link>
          </li>
          <li class="nav-item ">
            <router-link :to="{name: 'about'}" class="nav-link">Nosotros</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name: 'services'}" class="nav-link">Servicios</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name: 'contact'}" class="nav-link">Contacto</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>

   </template> 

