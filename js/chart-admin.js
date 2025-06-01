document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('layananChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: window.chartLabels || [],
                datasets: [{
                    label: 'Jumlah Pemesanan',
                    data: window.chartValues || [],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }
});
