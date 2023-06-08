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
                    "label" => "'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'",
                    "judul" => "Jumlah Pengendara Parkir 2023",
                    "data" => "43, 12, 32, 23, 13, 41, 21",
                    "color" => "'#ECAFFF'"
                ];
                include "widget/chart_bar.php";
            ?>
        </div>
        <div id="penjelasan">Penjelasan</div>
    </div>

    <div>
        <!-- BAGIAN 4 KOTAK -->
        <div class="kotak">
            <div class="kotak_1">
                <?php 
                    $data_donat = [
                        "canva" => 'c1',
                        "label" => "'Peningkatan', 'Kosong'",
                        "data" => "60, 40",
                        "color" => "'#36a2eb'"
                    ];
                    include "widget/chart_donat.php";
                ?>
            </div>
            <div class="kotak_2">
                <?php 
                    $data_donat = [
                        "canva" => 'c2',
                        "label" => "'Peningkatan', 'Kosong'",
                        "data" => "30, 70",
                        "color" => "'#bd93f9'"
                    ];
                    include "widget/chart_donat.php";
                ?>
            </div>
            <div class="kotak_3">
                <?php 
                    $data_donat = [
                        "canva" => 'c3',
                        "label" => "'Peningkatan', 'Kosong'",
                        "data" => "60, 40",
                        "color" => "'#ff6384'"
                    ];
                    include "widget/chart_donat.php";
                ?>
            </div>
            <div class="kotak_4">
                <?php 
                    $data_donat = [
                        "canva" => 'c4',
                        "label" => "'Peningkatan', 'Kosong'",
                        "data" => "60, 40",
                        "color" => "'#50fa7b'"
                    ];
                    include "widget/chart_donat.php";
                ?>
            </div>
        </div>
    </div>
</div>