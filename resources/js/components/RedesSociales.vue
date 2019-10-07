<template>
	<div>
		<a :href="'https://www.facebook.com/sharer/sharer.php?u='+url+'&title='+description"
		   title="Compartir en Facebook" 
		   target="_blank">
           <img alt="Compartir en Facebook" src="img/flat_web_icon_set/Facebook.png">
		 </a>
		 <a :href="'https://twitter.com/intent/tweet?url='+url+'&text='+description+'&via=CENMX&hashtags=CEN'" 
			 target="_blank" 
			 title="Tweet">
		    <img alt="Tweet" src="img/flat_web_icon_set/Twitter.png">
		</a>	
		 <a :href="'https://plus.google.com/share?url='+url" 
		 	target="_blank" 
		 	title="Compartir en Google+">
		    <img alt="Compartir en Google+" src="img/flat_web_icon_set/Google+.png">
		</a>
		<a :href="'http://pinterest.com/pin/create/button/?url='+url+'&description='+description" 
			target="_blank" 
			title="Pin it">
		    <img alt="Pin it" src="img/flat_web_icon_set/Pinterest.png">
		</a>

	</div>
</template>

<script type="text/javascript">
	export default{
		props: ['description'],
		computed: {
			url(){
				return document.URL;
			}
		}
	};
</script>