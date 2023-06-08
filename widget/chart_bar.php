<canvas id="chartBar"></canvas>
<script src="node_modules/chart.js/dist/chart.umd.js"></script>
<script>
    const ctx = document.getElementById('chartBar');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($data_bar["label"]) ?>,
            datasets: [{
                label: <?= json_encode($data_bar["judul"]) ?>,
                data: <?= json_encode($data_bar["data"]) ?>,
                backgroundColor: <?= json_encode($data_bar["color"]) ?>,
                borderRadius: 5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#FAFAFA'
                    }
                },
                x: {
                    ticks: {
                        color: '#FAFAFA'
                    }
                }
            }
        }
    });
</script>