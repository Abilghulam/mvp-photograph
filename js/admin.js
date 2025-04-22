document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.action-button form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const id = this.querySelector('input[name="id"]').value;
            const status = this.querySelector('input[name="status"]').value;
            const row = this.closest('tr');
            
            // Ketika tombol aksi diklik
            if (confirm(`Apakah Anda yakin ingin mengubah status pesanan ${id} menjadi ${status}?`)) {
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded', // ⬅️ penting
                    },
                    body: `id=${encodeURIComponent(id)}&status=${encodeURIComponent(status)}` // ⬅️ encode supaya aman
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const statusSpan = row.querySelector('.status');
                        statusSpan.className = `status ${status.toLowerCase()}`;
                        statusSpan.textContent = status;
                
                        const actionCell = row.querySelector('.action-button');

                        // Ganti tombol Terima/Tolak dengan tombol Detail
                        actionCell.innerHTML = `
                            <button class="btn btn-view" onclick="openDetailPesanan(${id})">Detail</button>
                        `;

                
                        alert(`Pesanan ${id} berhasil diubah menjadi ${status}.`);
                    } else {
                        alert(`Gagal: ${data.message}`);
                    }
                })
                
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memproses.');
                });
            }
        });
    });
});

function filterStatus(status) {
    if (status === '') {
        window.location.href = 'index-admin.php';
    } else {
        window.location.href = 'index-admin.php?status=' + encodeURIComponent(status);
    }
}

