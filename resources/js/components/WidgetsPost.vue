<template>
	
	<div class="col-md-4">

		<!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
		
		<div class="card my-4">
		    <h5 class="card-header">Categories</h5>
		    <div class="card-body">
		      <div class="row">
		        <div class="col-lg-6">
		          <ul class="list-unstyled mb-0">
		            <!-- @foreach($categories as $category)-->
		            <li v-for="category in categories">
		            	<router-link :to="{name: 'category_posts', params:{category: category.url} }"> 
		              		{{category.name}}
		              	</router-link>
		            </li>
		          </ul>
		        </div>
		      </div>
		    </div>
		  </div>

		  <!-- Side Widget -->
		  <div class="card my-4">
		    <h5 class="card-header">Autores</h5>
		    <div class="card-body">
		      <div class="row">
		        <div class="col-lg-6">
		          <ul class="list-unstyled mb-0">
		            <li v-for="author in authores">
		            	<p>{{author.name}}</p>
		              <!-- <a href="#">{{author.name}}</a> -->
		            </li>
		          </ul>
		        </div>
		      </div>
		    </div>
		  </div>

		  <!-- Side Widget -->
		  <div class="card my-4">
		    <h5 class="card-header">Ultimas Publicaciones</h5>
		    <div class="card-body">
		      <div class="row">
		        <div class="col-lg-6">
		          <ul class="list-unstyled mb-0">
		            <li v-for="lastpost in lastposts">
		              <router-link :to="{name: 'posts_show', params:{url: lastpost.url} }">  
							{{lastpost.title}}
					   </router-link>
		            </li>
		          </ul>
		        </div>
		      </div>
		    </div>
		  </div> 

		<!-- Side Widget -->
		  <div class="card my-4">
		    <h5 class="card-header">Publicaciones por mes</h5>
		    <div class="card-body">
		      <div class="row">
		        <div class="col-lg-6">
		          <ul class="list-unstyled mb-0">
		            <li class="text-capitalize" v-for="date in archivo">
		              <!-- <a href="{{ route('pages.home' , ['month' => $date->month, 'year' => $date->year]) }}">
		                {{$date->monthname}} {{$date->year}} ({{$date->posts}})
		              </a> -->
		              <a href="#">
		                {{date.monthname}} {{date.year}} ({{date.posts}})
		              </a>
		            </li>
		          </ul>
		        </div>
		      </div>
		    </div>
		  </div> 


	</div>

</template>

<script type="text/javascript">
	
	export default{
		props: ['categories','authores','lastposts','archivo']
	}
</script>