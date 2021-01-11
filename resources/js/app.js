
require('./bootstrap');
require('./kostum/adminTemplate/phone_mode');
require('./kostum/adminTemplate/misc');
require('./mask');
// require('./kostum/kostum');

import VModal from 'vue-js-modal'
import router from './kostum/router/router'
import akses from  './kostum/akses'
import 'animate.css';


window.Vue = require('vue');
window.nv=new Vue();

window.btn_kelola = (bol)=>{
    $('.btn-submit-data').attr('disabled',bol)
}

Vue.prototype.$akses = new akses(window.user);
Vue.use(VModal, { dynamicDefault: { draggable: true, resizable: true } })


// Mement Js Component
import moment from 'moment';
Vue.filter('TGL',function(data){
    moment.locale('id');
    return moment(data).format('LL');
})
// ====


// MultiSelect Component
import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)
// =====

// Carousel component
import VueCarousel from 'vue-carousel';
 Vue.use(VueCarousel);
// =====

// Masking Component
import VueMask from 'v-mask'
Vue.use(VueMask);
// ===


// Label Uang Filter
const idr = new Intl.NumberFormat('en-US', {
	style: 'currency',
	currency: 'IDR',
	minimumFractionDigits: 0
})

Vue.filter('IDR',function(data){
	return idr.format(data);
})
// =====

//  money component
import money from 'v-money'
Vue.use(money, {
	 	decimal: ',',
        thousands: '.',
        prefix: 'Rp ',
        suffix: ' ',
        precision: 0,
})
// ====
// Toast Component
import toast from './kostum/alert/toast'
Vue.prototype.$toast = new toast;
//  ======

// Catch Component
import error from './kostum/alert/catch'
Vue.prototype.$error = new error;
//  ======

// Swal Manual
import swal from 'sweetalert2'
window.Swal=swal;
// =========

const gambarRule=Swal.mixin({
    title: 'Error!',
    text: 'Tidak dapat mengupload file lebih dari 2MB !',
    icon: 'error',
    confirmButtonText: 'Mengerti'
})
window.gambarRule  = gambarRule;

// Vform Component
import { Form, HasError, AlertError } from 'vform'
window.Form=Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
// ===============


// Confirm Delete Componen
import konfirmasiHapus from  './kostum/alert/delete_confirm'
window.konfirmasiHapus = konfirmasiHapus;
// =====

// Progress Componen
import VueProgressBar from 'vue-progressbar'
import options from  './kostum/progressBar/default'
Vue.use(VueProgressBar, options)
// =====

// Captcha component
Vue.prototype.$captKey ='6LcreRQaAAAAAC5G6evH5dfh70UxYKLekCdsVezQ';
// ========


// Pagination component
Vue.component('pagination', require('laravel-vue-pagination'));
// =====
const app = new Vue({
    el: '#app',
    router
});
