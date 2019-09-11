<?php 

//se creo este helper para todas las funciones de ayuda
//el archivo se carga en el archivo composer.json en la seccion autoload en la llave files->  "files":[ "app/Http/helpers.php"] y se vuelve a cargar el archivo en la consola con la instruccion "composer dumpautoload -o"


//esta funcion activa la clase para hacer foco en un link
function setActiveRoute($name)
{
	return request()->routeIs($name) ? 'active' : '';
}

 ?>