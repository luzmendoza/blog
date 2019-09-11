	<a href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullurl()}}&title={{$post->title }} " title="Compartir en Facebook" target="_blank">
          <img alt="Compartir en Facebook" src="{{ asset('img/flat_web_icon_set/Facebook.png')}}">
 </a>
 	<a href="https://twitter.com/intent/tweet?url={{ request()->fullurl() }}&text={{$post->title }}&via=CENMX&hashtags=CEN" target="_blank" title="Tweet">
    <img alt="Tweet" src="{{ asset('img/flat_web_icon_set/Twitter.png')}}">
</a>	
 <a href="https://plus.google.com/share?url={{request()->fullurl()}}" target="_blank" title="Compartir en Google+">
    <img alt="Compartir en Google+" src="{{ asset('img/flat_web_icon_set/Google+.png')}}">
</a>
<a href="http://pinterest.com/pin/create/button/?url={{request()->fullurl()}}&description={{$post->title }}" target="_blank" title="Pin it">
    <img alt="Pin it" src="{{ asset('img/flat_web_icon_set/Pinterest.png')}}">
</a>