function alertLogin() {
    Swal.fire({
        title: 'Login Dulu!',
        text: 'Untuk melakukan pemesanan, Anda harus login terlebih dahulu.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Login',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "logreg.php"; // Arahkan ke halaman login
        }
    })
}