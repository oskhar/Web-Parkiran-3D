<?php

try {
    $data_grafik = array(
        "label" => [],
        "data" => []
    );
    $result = mysqli_query($conn, "SELECT tanggal,jumlah FROM data_parkir");
    while ($data = mysqli_fetch_assoc($result)) {
        array_push($data_grafik['label'], $data['tanggal']);
        array_push($data_grafik['data'], $data['jumlah']);
    }
    $kemarin = array(
        "persen" => number_format(abs((($data_grafik['data'][count($data_grafik['data'])-1] - $data_grafik['data'][count($data_grafik['data'])-2])/72)*100), 2),
        "kata" => $data_grafik['data'][count($data_grafik['data'])-1] > $data_grafik['data'][count($data_grafik['data'])-2] ? "peningkatan" : "penurunan"
    );

    $lusa = array(
        "persen" => number_format(abs((($data_grafik['data'][count($data_grafik['data'])-1] - $data_grafik['data'][count($data_grafik['data'])-3])/72)*100), 2),
        "kata" => $data_grafik['data'][count($data_grafik['data'])-1] > $data_grafik['data'][count($data_grafik['data'])-3] ? "peningkatan" : "penurunan"
    );

    $rata_minggu = 0;
    for ($i=1; $i <= 7; $i++) { 
        $rata_minggu += $data_grafik['data'][count($data_grafik['data'])-$i];
    }
    $rata_minggu = number_format($rata_minggu/7, 0);
    $minggu_ini = array(
        "persen" => number_format(abs((($data_grafik['data'][count($data_grafik['data'])-1] - $rata_minggu)/72)*100), 2),
        "kata" => $data_grafik['data'][count($data_grafik['data'])-1] > $rata_minggu ? "peningkatan" : "penurunan"
    );

    $rata_minggu_lalu = 0;
    for ($i=8; $i <= 15; $i++) { 
        $rata_minggu_lalu += $data_grafik['data'][count($data_grafik['data'])-$i];
    }
    $rata_minggu_lalu = number_format($rata_minggu_lalu/7, 0);
    $minggu_lalu = array(
        "persen" => number_format(abs((($data_grafik['data'][count($data_grafik['data'])-1] - $rata_minggu_lalu)/72)*100), 2),
        "kata" => $data_grafik['data'][count($data_grafik['data'])-1] > $rata_minggu_lalu ? "peningkatan" : "penurunan"
    );

} catch (\Throwable $er) {
    echo (" (grafik.php) pesan: " . $er);

}

?>
<link rel="stylesheet" href="style/styleDas_2.css">
<!-- JUDUL -->
<h1>Grafik (Chart/Graph)</h1>
<!-- GRAFIK -->
<div id="isi_grafik">
    <!-- BAGIAN GRAFIK -->
    <div>
        <div class="grafik">
            <?php 
            $data_bar = [
                "label" => $data_grafik['label'],
                "judul" => "Jumlah Pengendara Parkir 2023",
                "data" => $data_grafik['data'],
                "color" => "#ECAFFF"
            ];
                include "widget/chart_bar.php";
            ?>
        </div>
        <div id="penjelasan">
            <h3>Laporan</h3>
            Pengendara yang parkir mengalami <?= $kemarin["kata"] ?> sebesar 🟦 <?= $kemarin["persen"] ?>% dibandingkan dengan hari kemarin, <?= $lusa["kata"] ?> sebesar 🟪 <?= $lusa["persen"] ?>% dengan 2 hari yang lalu. Rata rata pengendara parkir minggu ini adalah <?= $rata_minggu ?> pengendara, jika dibandingkan dengan pengendara yang parkir hari ini mengalami <?= $minggu_ini["kata"] ?> sebesar 🟥 <?= $minggu_ini["persen"] ?>%. Sedangkan minggu lalu rata rata pengendara parkir adalah <?= $rata_minggu_lalu ?> yang berarti mengalami <?= $minggu_lalu["kata"] ?> sebesar 🟩 <?= $minggu_lalu["persen"] ?>%.
        </div>
    </div>

    <div>
        <!-- BAGIAN 4 KOTAK -->
        <div class="kotak">
            <div class="kotak_1">
                <?php 
                    $data_donat = [
                        "canva" => 'c1',
                        "label" => "'".ucfirst($kemarin['kata'])." $kemarin[persen]%', 'Kosong'",
                        "data" => "$kemarin[persen], ".(100-$kemarin['persen']),
                        "color" => "'#36a2eb'"
                    ];
                    include "widget/chart_donat.php";
                ?>
            </div>
            <div class="kotak_2">
                <?php 
                    $data_donat = [
                        "canva" => 'c2',
                        "label" => "'".ucfirst($lusa['kata'])." $lusa[persen]%', 'Kosong'",
                        "data" => "$lusa[persen], ".(100-$lusa['persen']),
                        "color" => "'#bd93f9'"
                    ];
                    include "widget/chart_donat.php";
                ?>
            </div>
            <div class="kotak_3">
                <?php 
                    $data_donat = [
                        "canva" => 'c3',
                        "label" => "'".ucfirst($minggu_ini['kata'])." $minggu_ini[persen]%', 'Kosong'",
                        "data" => "$minggu_ini[persen], ".(100-$minggu_ini['persen']),
                        "color" => "'#ff6384'"
                    ];
                    include "widget/chart_donat.php";
                ?>
            </div>
            <div class="kotak_4">
                <?php 
                    $data_donat = [
                        "canva" => 'c4',
                        "label" => "'".ucfirst($minggu_lalu['kata'])." $minggu_lalu[persen]%', 'Kosong'",
                        "data" => "$minggu_lalu[persen], ".(100-$minggu_lalu['persen']),
                        "color" => "'#50fa7b'"
                    ];
                    include "widget/chart_donat.php";
                ?>
            </div>
        </div>
    </div>
</div>