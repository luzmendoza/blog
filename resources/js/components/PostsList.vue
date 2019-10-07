<template>
	

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Publicaciones
          <!--  @if(isset($filtro))
           <br>
             <small>todo sobre {{ $filtro->name }}</small>
           @endif -->

        </h1>

        <!-- Blog Post -->
          <div v-for="post in items" class="card mb-4">
            <!--<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">-->
             <!-- @include('includes.photospost') -->

            <div class="card-body">

              <h2 class="card-title">{{ post.title}}</h2>
              <p class="card-text">{{ post.except}} </p> 
              <router-link :to="{name: 'posts_show', params:{url: post.url} }" class="btn btn-primary">     Leer más &rarr;
              </router-link>
               
              <p class="card-text categoria" align="right">
                  <router-link :to="{name: 'category_posts', params:{category: post.category.url} }"> 
                      {{ post.category.name }} 
                   </router-link>
              </p>

              <span v-for="tag in post.tags" class="card-text categoria" align="right">
                <router-link :to="{name: 'tags_posts', params:{tag: tag.url} }"> 
                    #{{ tag.name }}
                </router-link>
              </span>

            </div>
            <div class="card-footer text-muted">
               Publicado el {{ post.published_date }} por {{ post.owner.name }}
             
           </div>
          </div>
          
          <div class="card mb-4" v-if=" ! items.length">
            <div class="card-body">
              <h2 class="card-title">No hay publicaciones todavia</h2>
            </div>
          </div>

         <!-- Pagination -->
         <pagination-links :paginate="paginate"></pagination-links>
         

      </div>

      <!-- Sidebar Widgets Column -->
      <widgets-post :categories="categories" :authores="authores" :lastposts="lastposts" :archivo="archivo"></widgets-post>
        

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

</template>

<script type="text/javascript">
	
	export default{
		props: ['items','categories','authores','lastposts','archivo','paginate']
	};
</script>