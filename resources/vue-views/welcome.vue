<template>
    <div>
        <h1>
            Implementasi SSO login , dengan auth akses utama terdapat pada  amr-sispen.herokuapp.com 
        </h1>
        <hr>
        <h5>Bagaimana cara kerjanya ?</h5>
        <ul style="list-style: none">
            <li>
                1 . Kita melakukan registrasi sebagai user pada 
                <a href="https://amr-sispen.herokuapp.com/" target="blank">
                    https://amr-sispen.herokuapp.com/
                </a>
            </li>
            <li>
                2 . Setelah kita berhasil registrasi , kita coba <router-link to="login">Login</router-link> pada aplikasi ini  menggunakan username dan password yang kita registrasikan tadi
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{

        },
    }
</script>
