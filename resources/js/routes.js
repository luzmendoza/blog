import Vue from 'vue';

import Router from 'vue-router';

Vue.use(Router);

export default new Router({
	routes: [
		{ 
			path: '/',
			name: 'home',
			component: require('./views/home').default
		},
		{ 
			path: '/nosotros',
			name: 'about',
			component: require('./views/about').default
		},
		{ 
			path: '/servicios',
			name: 'services',
			component: require('./views/services').default
		},
		{ 
			path: '/contacto',
			name: 'contact',
			component: require('./views/contact').default
		},
		{ 
			path: '/blog/:url',
			name: 'posts_show',
			component: require('./views/postshow').default
		},
		{ 
			path: '/categorias/:category',
			name: 'category_posts',
			component: require('./views/categoryposts').default
		},
		{ 
			path: '/etiquetas/:tag',
			name: 'tags_posts',
			component: require('./views/tagsposts').default
			//props: true  //pasa como parametros las priedades
		},
		{ 	//esta vista siempre debe de ser la ultima
			path: '*',
			component: require('./views/404').default
		}
	],
	linkExactActiveClass: 'active',
	//mode: 'history'
});
