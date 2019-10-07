<template>

 <paginator
  :url="url"
  component-name="posts-list"
> </paginator>

</div> 

</template>

<script>

  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
  var url = baseUrl + '/public/api/posts/';

  export default {

      data(){
              return {
                url: url
              }
          },
  };

</script>


