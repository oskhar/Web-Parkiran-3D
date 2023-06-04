<?php

$data_bar = [
    "label" => "'Januari', 'Februari', 'Maret', 'April'",
    "judul" => "Jumlah Pengendara Parkir 2023",
    "data" => "43, 12, 32, 23"
]

?>
<canvas id="chartBar"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<script>
    const ctx = document.getElementById('chartBar');

    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $data_bar["label"] ?>],
        datasets: [{
        label: '<?php echo $data_bar["judul"] ?>',
        data: [<?php echo $data_bar["data"] ?>],
        backgroundColor: "#ECAFFF",
        borderRadius: 5
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
    });
</script>