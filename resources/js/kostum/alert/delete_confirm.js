import Swal from 'sweetalert2'

// Deletion Component
const konfirmasiHapus = Swal.mixin({
    title: 'Menghapus data ini ?',
    text: "Seluruh data yang terdapat didalamnya ikut terhapus ! ",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Hapus !',
    cancelButtonText: 'Batal'
});

export default konfirmasiHapus;
// =====
