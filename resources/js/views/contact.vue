<template>

<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contacto
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Inicio</a>
      </li>
      <li class="breadcrumb-item active">Contacto</li>
    </ol>

     <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Información de Contacto</h3>
        <p>
          3301 Meteoro, Alttuz Residencial
          <br>Culiacan, Sinaloa. CP 80020
          <br>
        </p>
        <p>
          Telefono: (044) 667-2734509
        </p>
        <p>
          Email:
          <a href="mailto:joelsalazar118@gmail.com">joelsalazar118@gmail.com
          </a>
        </p>
        <p>
          Horario: Lunes a Sabado: 9:00 AM a 5:00 PM
        </p>
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Envianos un mensaje</h3>

       <form-contacto></form-contacto>

      </div>

    </div>
    <!-- /.row -->

</div>

</template>