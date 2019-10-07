<template>
	
	<div>
		
		<ul class="pagination justify-content-center mb-4">
		   <li class="page-item" v-for="page in paginate.last_page" v-if="paginate.last_page > 1">
		     <router-link class="page-link" :class="getActiveClass(page)" :to="{
		        name: $route.name,
		        query: {
		          page: page
		        }
		     }">
		          {{page}}
		     </router-link>
		   </li>

		 </ul>

	</div>

</template>

<script type="text/javascript">
	
	export default{
		  props: ['paginate'],
	      methods: {
	        getActiveClass(page){
	            return[
	                ! this.$route.query.page && page == 1 ? 'active' : ''
	            ];
	        }
	      }
	};
</script>


<style lang="scss">
    .pagination{
       a.active{
          background-color: #276d04;
          color: white;
       }
    }

</style>