<template>
	<div>
		
		<!---SE PUEDE UTILIZAR PARA PAGINAR CUALQUIER COSA-->
		<component :is="componentName" :items="items" :categories="categories" :authores="authores" :lastposts="lastposts" :archivo="archivo" :paginate="paginate"></component>

		<!-- <pagination-links :paginate="paginate"></pagination-links> -->
	</div>
	
</template>

<script type="text/javascript">
	export default{
		props: ['url','componentName'],
		data(){
			return{
				paginate: {},
				items: [],
				categories: [],
                authores: [],
                lastposts: [],
                archivo: [],
                paginate: [],
			}
		},
		mounted()
	      {
	          //axios es una libreria que permite llamdas ajax
	          axios.get(this.url+'?page='+this.$route.query.page || 1)//tambien se le pueden agregar parametros
	                .then(resp => {  //promesa, una accion despues del llamado ajax
	                    this.items = resp.data.posts.data; //asigna datos a la variable del data arriba 
	                    this.categories = resp.data.categories;
	                    this.authores = resp.data.authores;
	                    this.lastposts = resp.data.lastposts;
	                    this.archivo = resp.data.archivo;
	                    this.paginate = resp.data.posts;
	                    delete this.paginate.data;
	                    //console.log(this.paginate)
	                })
	                .catch(error => {
	                    console.log(error);
	                }); 

	                 console.log('url');
	                console.log(this.url);
	      }
	}
</script>