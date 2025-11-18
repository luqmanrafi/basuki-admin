// Admin JS for High Quality Theme
document.addEventListener("DOMContentLoaded", function() {
    // Chart.js Example
    const ctx = document.getElementById('myChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'New Mitra',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'rgba(59, 130, 246, 0.5)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1,
                    borderRadius: 5,
                    barThickness: 20,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#6b7280' },
                        grid: { color: '#e5e7eb' }
                    },
                    x: {
                        ticks: { color: '#6b7280' },
                        grid: { display: false }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Hiding legend for a cleaner look
                    }
                }
            }
        });
    }
});
