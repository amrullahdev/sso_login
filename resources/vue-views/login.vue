<template>
    <div>
        <div class="row">
            <div class="col-md"></div>
            <div class="col-md">
                <transition
                    enter-active-class="animate__animated animate__fadeInRight animate__faster ">
                    <registrasiComp v-if="registrasi == true" ></registrasiComp>
                </transition>
                <transition
                    enter-active-class="animate__animated animate__fadeInLeft animate__faster  "
                    >

                    <div class="bg-white p-2 rounded bs-1" 
                    v-if="registrasi == false"
                    :class="{'absolute': registrasi}"
                    >
                        <div class="p-5 text-center font-weight-bold h3">
                            Selamat Datang <br>
                        </div>
                        <div class="alert alert-success  alert-dismissible fade show" 
                            v-if="telah_registrasi">
                            Akun Berhasil di daftarkan <br> silahkan login !
                             <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <div class="form-group p-2">
                            <form @submit.prevent="login">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control form-control-sm" v-model="form.username">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <div class="input-group">
                                        <input
                                        type="password"
                                        id="password"
                                        class="form-control form-control-sm" 
                                        v-model="form.password">
                                        <span class="input-group-prepend">
                                            <button class="btn btn-sm als round-right"
                                            @click="show_password"
                                            type="button">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <vue-recaptcha 
                                    :sitekey="$captKey"  
                                    class="g-recaptcha" 
                                    ref="recaptcha"
                                    @verify="onCaptchaVerified"
                                    @expired="onCaptchaExpired"
                                    >
                                        
                                    </vue-recaptcha>
                                </div> -->
                                <div class="form-group">
                                    <button class=" btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                                <div class="form-group  text-center">
                                    Tidak Memiliki Akun ?
                                    <div @click="registrasi = !registrasi" class="cp text-primary">
                                        Daftar
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </transition>
            </div>
            <div class="col-md"></div>
        </div>
    </div>
</template>
<script>
import registrasiComp from './registrasi';
import VueRecaptcha from 'vue-recaptcha';

export default {
    components: {
        registrasiComp,
        VueRecaptcha
    },
    data() {
        return {
            captcha:true, //jika ingin menggunakan captcha ubah jadi : false,
            registrasi: false,
            telah_registrasi: false,
            typeInput: false,
            form: new Form({
                username: '',
                password: '',
            })
        }
    },
    mounted() {
        nv.$on('registrasi_false', ()=> {
            this.registrasi = false;
        })
        nv.$on('telah_registrasi', ()=> {
            this.registrasi = false;
            this.telah_registrasi = true;
        })

    },
    methods: {
        login(){
            if (this.captcha) {
                this.$toast.df102();
                    this.form.post('/sso-login')
                    .then(()=>{
                        this.$toast.df200();
                          window.location='/berhasil'
                    })
                    .catch((e)=>{
                        this.$error.catch(e)

                    })
            }else{
                Swal.fire({
                    icon:"warning",
                    title:'Kesalahan',
                    text:'Captcha tidak benar'
                })
            }

        },
        show_password(){
            this.typeInput = !this.typeInput;
            let password=document.getElementById("password");
            if (this.typeInput) {
                password.setAttribute('type','text')
            }else{
                password.setAttribute('type','password')
            }
        },
        onCaptchaVerified(recaptchaToken) {
           this.captcha=true;
        },  
        onCaptchaExpired(recaptchaToken) {
           this.captcha=false;
        },  
    },
}

</script>
