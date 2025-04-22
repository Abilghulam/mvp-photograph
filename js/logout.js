function confirmLogout() {
    Swal.fire({
        title: 'Yakin mau logout?',
        text: "Anda akan keluar dari sesi ini.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff6b6b', // Tombol "Ya, Logout"
        cancelButtonColor: '#6c757d', // Tombol "Batal"
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal',
        background: '#ffffff', // Background putih
        color: '#000000', // Warna teks hitam
        customClass: {
            popup: 'rounded-popup' // Tambahkan class custom
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'logreg.php';
        }
    });
}
