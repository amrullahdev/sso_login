import Vue from 'vue';
import VueRouter from 'vue-router';
import public_router from './public-router';
Vue.use(VueRouter);

let routes=[
	{ path: '/login', component: require('../../../vue-views/login.vue').default },	
]

for (var i =0; i < public_router.length; i++) {
	routes.push(public_router[i])
}

const route = new VueRouter({
	mode: 'history',
	routes 
});



export default route; 