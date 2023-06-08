<canvas id="<?php echo $data_donat["canva"] ?>"></canvas>
<script>
    var tesd = document.getElementById('<?php echo $data_donat["canva"] ?>');

    new Chart(tesd, {
        type: 'doughnut',
        data: {
            labels: [<?php echo $data_donat["label"] ?>],
            datasets: [{
                data: [<?php echo $data_donat["data"] ?>],
                backgroundColor: [<?php echo $data_donat["color"] ?>, '#E4E5F1'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            cutout: 80
        }
    });
</script>