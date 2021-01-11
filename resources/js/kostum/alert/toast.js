import Swal from 'sweetalert2'

export default class entahNamaDariClassKurangPenting {
    df102() {
        window.btn_kelola(true)
        Swal.mixin({
            title: 'Dalam Proses .. ',
            icon: 'info',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timerProgressBar: false,
            showCloseButton: true,
        }).fire();
    }

    df200() {
        window.btn_kelola(false)
        Swal.mixin({
            title: 'Proses Berhasil .. ',
            icon: 'success',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
        }).fire();
    }

    df500() {
        window.btn_kelola(false)
        Swal.mixin({
            title: 'Terjadi Kelas Server .. ',
            icon: 'warning',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
        }).fire();
    }
}
