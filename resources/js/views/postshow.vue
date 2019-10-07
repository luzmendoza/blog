<template>
		  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ post.title }}</h1>

        <!-- Author -->
        <p class="lead">
          por
         <a href="#"> {{ post.owner.name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Publicado el {{ post.published_date }}</p>

        <hr>

        <!-- Preview Image 
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
         @include('includes.photospost')
        -->
      

        <hr>

        <!-- Post Content -->
        <div v-html="post.body">
       		{{ post.body }}
       	</div> <!--Usar esta sintaxis para cuando incrusto html desde bd-->

        <hr>

      <!-- valida que contenga categorias para mostrar -->
       <!--   @if($post->category)-->
  			<blockquote class="blockquote">
  	          <footer class="blockquote-footer">
  	          		{{ post.category.name }}

  					<!--@foreach($post->tags as $tag)-->
  		                <cite v-for="tag in post.tags" title="Etiquetas">#{{ tag.name }}</cite>
  		           <!--   @endforeach-->
  	          </footer>
  	    </blockquote>
       <!--   @endif-->

		<!-- Redes Sociales-->
			<blockquote class="blockquote" align="right">
			     <redes-sociales :description="post.title"></redes-sociales>
	    </blockquote>
	  
        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <widgets-post :categories="categories" :authores="authores" :lastposts="lastposts" :archivo="archivo"></widgets-post>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</template>

<script type="text/javascript">

	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
	var url = baseUrl + '/public/api/blog/';

	//hacer una consulta api para obtener la informacion del post
	export default{
		data()
		{
			return{
				post: {	//almacenara el objeto recibido de la api
					owner: {},     //definir los elementos vacios para evitar errores antes de que se carge
					category: {},
					tags: {},
					photos: {}
				},
        categories: [],
        authores: [],
        lastposts: [],
        archivo: [] 
			}
		},
		mounted: function(){ //hacer llamado ajax cuando se monta el componente
			//console.log(this.$route.params.url);
			axios.get(url+this.$route.params.url)
			.then(resp => {
				  this.post = resp.data.post;
          this.categories = resp.data.categories;
          this.authores = resp.data.authores;
          this.lastposts = resp.data.lastposts;
          this.archivo = resp.data.archivo;
          //console.log(res.data)
			})
			.catch(error => {
				console.log(error);
			})
		}
	}
</script>