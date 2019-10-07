<template>
	
 <paginator
  :url="url"
  component-name="posts-list"
></paginator> 

</template>



<script>

  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
  var url = baseUrl + '/public/api/categorias/';

  export default {

      data(){
              return {
                url: url+this.$route.params.category
              }
          },
     
  };

</script>

