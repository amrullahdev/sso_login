import Vue from 'vue';
import VueRouter from 'vue-router';
import public_router from './public-router';
Vue.use(VueRouter);

let routes=[
	// Router khusus yang login sebagai admin
]


// Router public yang dapat di  akses admin  / client
// saat sudah login
for (var i = 0; i<public_router.length ; i++) {
	routes.push(public_router[i])
}

const route = new VueRouter({
	mode: 'history',
	routes 
});



export default route; 