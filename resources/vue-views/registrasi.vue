<template>
    <div>
        <div class="row">
            <div class="col-md"></div>
            <div class="col-md-5">
                <div class="bg-white p-2 rounded bs-1">
                    <div class="mt-5 pb-1 text-center font-weight-bold h3">
                        Daftar akun baru
                    </div>
                    <div class="form-group p-2">
                        <form @submit.prevent="register">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" v-model="form.nama" class="form-control form-control-sm" :class="{'is-invalid': form.errors.has('nama')}">
                                <has-error :form="form" field="nama"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" v-model="form.email" class="form-control form-control-sm" :class="{'is-invalid': form.errors.has('email')}">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control form-control-sm" v-model="form.username" :class="{'is-invalid' : form.errors.has('username')}">
                                <has-error :form="form" field="username"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <div class="input-group">
                                    <input
                                    type="password"
                                    id="password"
                                    class="form-control form-control-sm"
                                    v-model="form.password"
                                    :class="{'is-invalid':form.errors.has('password')}"
                                    >
                                    <span class="input-group-prepend">
                                        <button 
                                            class="btn btn-sm als round-right" 
                                            @click="show_password" 
                                            type="button"
                                            >
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </span>
                                </div>
                                <has-error :form="form" field="password"></has-error>
                            </div>
            <!--                 <div class="form-group">
                                <vue-recaptcha 
                                sitekey="6LcreRQaAAAAAC5G6evH5dfh70UxYKLekCdsVezQ"  
                                class="g-recaptcha" 
                                ref="recaptcha"
                                @verify="onCaptchaVerified"
                                @expired="onCaptchaExpired"
                                >
                                    
                                </vue-recaptcha>
                            </div> -->
                            <div class="form-group">
                                <button class=" btn btn-primary btn-block">
                                    Registrasi Akun
                                </button>
                            </div>
                            <div class="form-group  text-center">
                                Sudah memiliki akun ?
                                <div @click="gotoLogin" class="cp text-primary">
                                        Login
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md"></div>
        </div>
    </div>
</template>
<script>
import VueRecaptcha from 'vue-recaptcha';

export default {
    components: { VueRecaptcha },
    data() {
        return {
            typeInput: false,
            captcha:true, //jika ingin menggunakan captcha ubah jadi : false,
            form: new Form({
                nama: '',
                email: '',
                username: '',
                password: '',
            })
        }
    },
    mounted() {

    },
    methods: {
        gotoLogin(){
            nv.$emit('registrasi_false');
        },
        register() {
            this.validasiCaptcha()
            this.$toast.df102();
            this.form.post('/api/daftar')
                .then(() => {
                    this.$toast.df200();
                    this.$router.push('/login')
                    nv.$emit('telah_registrasi');
                })
                .catch((e) => {
                    if (e.response.status == 500) {
                        return this.$toast.df500();    
                    }
                })
        },
        show_password() {
            this.typeInput = !this.typeInput;
            if (this.typeInput) {
                $('#password').attr('type', 'text')
            } else {
                $('#password').attr('type', 'password')
            }
        },
        onCaptchaVerified(recaptchaToken) {
           this.captcha=true;
        },  
        onCaptchaExpired(recaptchaToken) {
           this.captcha=false;
        },  
        validasiCaptcha(){
            if (this.captcha==false) {
                 Swal.fire({
                    icon:'warning',
                    title:'Captcha tidak benar !',
                })
                throw console.log('Captch Error');
            }
        }
    },
}

</script>
