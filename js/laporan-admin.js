// Fungsi untuk filter berdasarkan status
function filterStatus(status) {
    const urlParams = new URLSearchParams(window.location.search);

    // Update filter status
    if (status === '') {
        urlParams.delete('status');
    } else {
        urlParams.set('status', status);
    }

    // Reset ke halaman pertama saat ganti status
    urlParams.delete('page');

    // Pertahankan filter tanggal jika ada
    const fromDate = document.getElementById('from_date')?.value || '';
    const toDate = document.getElementById('to_date')?.value || '';

    if (fromDate) {
        urlParams.set('from_date', fromDate);
    }
    if (toDate) {
        urlParams.set('to_date', toDate);
    }

    // Redirect ke URL baru
    window.location.href = 'laporan-admin.php?' + urlParams.toString();
}

// Fungsi untuk mengisi hidden input saat download PDF
document.addEventListener('DOMContentLoaded', function () {
    const downloadForm = document.querySelector('form[action="php/export-pdf.php"]');
    if (downloadForm) {
        downloadForm.addEventListener('submit', function() {
            const fromDateInput = document.getElementById('from_date');
            const toDateInput = document.getElementById('to_date');
            const hiddenFromDate = document.getElementById('hidden_from_date');
            const hiddenToDate = document.getElementById('hidden_to_date');

            if (fromDateInput && hiddenFromDate) {
                hiddenFromDate.value = fromDateInput.value;
            }
            if (toDateInput && hiddenToDate) {
                hiddenToDate.value = toDateInput.value;
            }
        });
    }
});
