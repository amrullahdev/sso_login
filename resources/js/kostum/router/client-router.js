import Vue from 'vue';
import VueRouter from 'vue-router';
import router_public from './public-router';
Vue.use(VueRouter);



let routes=[
{ path: '/berhasil', component: require('../../../vue-views/onlogin/loged_page.vue').default },
	// Router khusus yang login sebagai Client

]


// Router public yang dapat di  akses admin  / client
// saat sudah login
for (var i = 0; i < router_public.length; i++) {
	routes.push(router_public[i])  
}

const route = new VueRouter({
	mode: 'history',
	routes 
});



export default route; 