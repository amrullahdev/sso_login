import non_login from './non-login.js'
import admin_router from './admin-router.js'
import client_router from './client-router.js'

let route;
let role_user

if (window.user) {
	role_user=window.user.akses;
}else{
	role_user=0;
}

if (role_user == '5') {
	route=admin_router;
}

if (role_user == 'client') {
	route=client_router;
}

if (role_user==0) {
	route=non_login;
}


export default route;