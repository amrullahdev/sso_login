//	Public router dibuat terpisah dengan non-login js 
//	agar saat memanggil data pada public router ini 
//	tinggal di looping di non-login js

let data=[
	{ path: '/', component: require('../../../vue-views/welcome.vue').default },
]


if (window.user) {
	data.push(
		// Router public untuk user yang telah login 
	)
}


let notFound={ path: '/*', component: require('../../../vue-views/404.vue').default };
data.push(notFound)

export default data;