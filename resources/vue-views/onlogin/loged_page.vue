<template>
    <div>
        Selamat , Kamu telah berhasil login dengan akun
        <table class="table table-light mt-3">
            <tr>
                <th>Nama</th>
                <td> {{varAkun.nama}} </td>
            </tr>
            <tr>
                <th>Username</th>
                <td> {{varAkun.username}} </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                varAkun:[],
            }
        },
        mounted() {
            this.laodAkun();
        },
        methods:{
            laodAkun(){
                this.$Progress.start()
                axios.get('/api/load-akun')
                .then(({data})=>{
                    this.$Progress.finish()
                    this.varAkun=data.varAkun;
                })
                .catch((e)=>{
                    this.$Progress.error()
                    this.$error.catch(e);
                })
            }
        },
    }
</script>
