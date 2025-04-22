// Buka modal dan isi data
function openDetailPesanan(id) {
    fetch(`php/detail.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }

            document.getElementById('detailNama').textContent = `Pesanan: ${data.nama_lengkap}`;
            
            const detailList = document.getElementById('detailData');
            detailList.innerHTML = `
                <li><strong>Jenis Layanan:</strong> ${data.jenis_layanan}</li>
                <li><strong>Tanggal:</strong> ${data.tanggal_pemesanan}</li>
                <li><strong>Waktu:</strong> ${data.waktu_pemesanan}</li>
                <li><strong>Lokasi:</strong> ${data.lokasi}</li>
                <li><strong>Nomor Telepon:</strong> ${data.nomor_telepon}</li>
                <li><strong>Email:</strong> ${data.email}</li>
                <li><strong>Status:</strong> ${data.status}</li>
            `;

            document.getElementById('detailPesananModal').style.display = 'flex';
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Tutup modal
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Klik di luar modal untuk tutup
window.onclick = function(event) {
    const modal = document.getElementById('detailPesananModal');
    if (event.target === modal) {
        closeModal('detailPesananModal');
    }
}

// Konfirmasi status
function confirmAction() {
    setTimeout(function() {
        window.location.reload();
    }, 500); // Reload halaman setelah 0.5 detik (kasih waktu submit ke server)
    return true;
}

