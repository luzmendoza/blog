<template>
	<div id="flipbook">
	  <div > Turn.js </div> 
	  <div ></div>
	  <div> Page 1 </div>
	  <div> Page 2 </div>
	  <div> Page 3 </div>
	  <div> Page 4 </div>
	  <div ></div>
  	  <div ></div>
	</div>
</template>

<script type="text/javascript">
	/*$(function(){    //document ready
	    $("#flipbook").turn({
	        width: 400,
	        height: 300,
	        autoCenter: true
	    });
	});*/

	
	export default {
        mounted() {
            $("#flipbook").turn({  //aqui se carga la revista
		        width: 400,
		        height: 300,
		        autoCenter: true
		    });
        }
    };

</script>