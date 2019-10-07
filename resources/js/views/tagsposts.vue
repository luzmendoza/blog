<template>

<!--Estos es un componente, que pasa como parametros los posts-->
<!--  <posts-list :posts="posts" :categories="categories" :authores="authores" :lastposts="lastposts" :archivo="archivo"></posts-list>  -->

 <paginator
  :url="url"
  component-name="posts-list"
> </paginator>

</template>

<script>

  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
  var url = baseUrl + '/public/api/etiquetas/';

  export default {

      //props: ['tag'],//definicion de propiedades pasadas desde la url
      data(){
              return {
                url: url+this.$route.params.tag
              }
          },
      //agregar metodo que se dispare cuando la pagina ha sido montada o renderizada
      /*mounted: function()
      {
          //this.getPosts();
          //axios es una libreria que permite llamdas ajax
              axios.get(url+this.$route.params.tag)//tambien se le pueden agregar parametros
                .then(resp => {  //promesa, una accion despues del llamado ajax
                    this.posts = resp.data.posts.data; //asigna datos a la variable del data arriba declarada
                    this.categories = resp.data.categories;
                    this.authores = resp.data.authores;
                    this.lastposts = resp.data.lastposts;
                    this.archivo = resp.data.archivo;
                })
                .catch(error => {
                    console.log(error);
                }); 
      }*/
      //,
      // methods: {
      //     getPosts(){
      //         //axios es una libreria que permite llamdas ajax
      //         axios.get(url+this.$route.params.tag)//tambien se le pueden agregar parametros
      //           .then(resp => {  //promesa, una accion despues del llamado ajax
      //               this.posts = resp.data.data; //asigna datos a la variable del data arriba declarada
      //               console.log(this.posts)
      //           })
      //           .catch(error => {
      //               console.log(error);
      //           }); 
      //     }
      // },
      // watch: {  //usar watch para refrescar el llamado ajax cuando la ruta cambie
      //     '$route'()
      //     {
      //        this.getPosts();
      //     }
      // }
  }

</script>