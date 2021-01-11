import router from '../router/router'

export default class catching {
	catch(e){
		const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        if (e.response.status == 422) {
            window.btn_kelola(false)
            Toast.fire({
                title: 'Kesalahan Validasi ..',
                icon: 'warning',
            })
        }

        if (e.response.status == 400) {
            window.btn_kelola(false)
            Swal.fire({
                title: 'Kesalahan Validasi ..',
                icon: 'warning',
                text:e.response.data.message
            })
        }

        if (e.response.status == 401) {
            window.btn_kelola(false)
            Toast.fire({
                title: 'Sesi Login Kadaluarsa ..',
                icon: 'warning',
            }).then(()=>{
                window.location='/login'
            })
        }

        if (e.response.status == 404) {
            window.btn_kelola(false)
            Toast.fire({
                title: 'Data Tidak Ditemukan ..',
                icon: 'warning',
            })
            router.push('/404')
        }

        if (e.response.status == 422) {
            window.btn_kelola(false)
            Toast.fire({
                icon:'warning',
                title:'Kombinasi Username & Password tidak dikenal',
            })
        }

        if (e.response.status == 500) {
            window.btn_kelola(false)
            Toast.fire({
                title: 'Terjadi Kesalahan Server ..',
                icon: 'warning',
            })
        }

	}
}