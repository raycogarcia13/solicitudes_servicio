const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

if (typeof error !== 'undefined') {
    Toast.fire({
        type: 'error',
        title: 'Error de autenticación'
    })
}