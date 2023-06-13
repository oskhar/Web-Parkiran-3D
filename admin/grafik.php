<?php

try {
    // MENGHITUNG DATA PADA GRAFIK
    $data_grafik = array(
        "label" => [],
        "data" => []
    );

        // Memasukan data dari database menjadi masing masing array
    $result = mysqli_query($conn, "SELECT tanggal,jumlah FROM data_parkir");
    while ($data = mysqli_fetch_assoc($result)) {
        array_push($data_grafik['label'], $data['tanggal']);
        array_push($data_grafik['data'], $data['jumlah']);
    }

        // Menghitung data hari ini dengan kemarin
    $data_saat_ini = $data_grafik['data'][count($data_grafik['data'])-1];
    $data_kemarin = $data_grafik['data'][count($data_grafik['data'])-2];
    $kemarin = array(
        "persen" => number_format(abs((($data_saat_ini - $data_kemarin)/72)*100), 2),
        "kata" => $data_saat_ini > $data_kemarin ? "peningkatan" : "penurunan"
    );

        // Menghitung data hari ini dengan kemarin lusa
    $data_kemarin_lusa = $data_grafik['data'][count($data_grafik['data'])-3];
    $kemarin_lusa = array(
        "persen" => number_format(abs((($data_saat_ini - $data_kemarin_lusa)/72)*100), 2),
        "kata" => $data_saat_ini > $data_kemarin_lusa ? "peningkatan" : "penurunan"
    );

        // Menghitung rata rata pengunjung minggu ini
    $rata_minggu = 0;
    for ($i=1; $i <= 7; $i++) { 
        $rata_minggu += $data_grafik['data'][count($data_grafik['data'])-$i];
    }

        // Menghitung data hari ini dengan rata rata dari pengunjung minggu ini
    $rata_minggu = number_format($rata_minggu/7, 0);
    $minggu_ini = array(
        "persen" => number_format(abs((($data_saat_ini - $rata_minggu)/72)*100), 2),
        "kata" => $data_saat_ini > $rata_minggu ? "peningkatan" : "penurunan"
    );

        // Menghitung rata rata pengunjung minggu ini
    $rata_minggu_lalu = 0;
    for ($i=8; $i <= 15; $i++) { 
        $rata_minggu_lalu += $data_grafik['data'][count($data_grafik['data'])-$i];
    }

        // Menghitung data hari ini dengan rata rata dari pengunjung minggu ini
    $rata_minggu_lalu = number_format($rata_minggu_lalu/7, 0);
    $minggu_lalu = array(
        "persen" => number_format(abs((($data_saat_ini - $rata_minggu_lalu)/72)*100), 2),
        "kata" => $data_saat_ini > $rata_minggu_lalu ? "peningkatan" : "penurunan"
    );

    // MEMASUKAN PESAN KE DATABASE
    if (isset($_POST['komen'])) {
        
            // Memasukan pesan ke database
        session_start();
        $username = $_SESSION['username'];
        $hari_ini = date("Y-m-d");
        $sql = "INSERT INTO komentar VALUES(0, '$hari_ini', '$username', '$_POST[komen]')";
        mysqli_query($conn, $sql);

            // Munculkan popup ketika data berhasil dimasukan
        $pesan = array(
            "text" => "Pesan berhasil dikirim ✅",
            "background" => "var(--sucess)"
        );
        include "widget/popup_biasa.php";

    }

    // MENGHAPUS PESAN
    if (isset($_GET['id_hapus'])) {

            // Menghapus data dari database
        $sql = "DELETE FROM komentar WHERE id=$_GET[id_hapus]";
        mysqli_query($conn, $sql);

            // Munculkan popup ketika data berhasil dihapus
        $pesan = array(
            "text" => "Pesan berhasil dihapus ✅",
            "background" => "var(--warning)"
        );
        include "widget/popup_biasa.php";

    }

    // MEMBACA ISI TABEL KOMENTAR DARI DATABASE
    $sql = "SELECT * FROM komentar";
    $result = mysqli_query($conn, $sql);

} catch (\Throwable $er) {
    echo (" (grafik.php) pesan: " . $er);

}

?>
<link rel="stylesheet" href="style/grafik.css">
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
            Pengendara yang parkir mengalami <?= $kemarin["kata"] ?> sebesar 🟦 <?= $kemarin["persen"] ?>% dibandingkan dengan hari kemarin, <?= $kemarin_lusa["kata"] ?> sebesar 🟪 <?= $kemarin_lusa["persen"] ?>% dengan 2 hari yang lalu. Rata rata pengendara parkir minggu ini adalah <?= $rata_minggu ?> pengendara, jika dibandingkan dengan pengendara yang parkir hari ini mengalami <?= $minggu_ini["kata"] ?> sebesar 🟥 <?= $minggu_ini["persen"] ?>%. Sedangkan minggu lalu rata rata pengendara parkir adalah <?= $rata_minggu_lalu ?> yang berarti mengalami <?= $minggu_lalu["kata"] ?> sebesar 🟩 <?= $minggu_lalu["persen"] ?>%.
        </div>
        <div id="komen">
            <form method="post">
                <h3>Pesan dan Catatan</h3>
                <textarea name="komen" placeholder="Masukan pesan..." required></textarea>
                <button type="submit" value="kirim">kirim</button>
            </form>
            <h3 id="judul">Isi Catatan</h3>
            <?php while($data = mysqli_fetch_assoc($result)): ?>
                <div>
                    <b><?= $data['username'] ?>:</b><br>
                    <sup><?= $data['tanggal'] ?></sup>
                    <p><?= $data['pesan'] ?></p>
                    <a href="?page=grafik&id_hapus=<?= $data['id'] ?>"><button id="hapus">X</button></a>
                </div>
            <?php endwhile; ?>
        </div>
        <div id="list_komen"></div>
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
                        "label" => "'".ucfirst($kemarin_lusa['kata'])." $kemarin_lusa[persen]%', 'Kosong'",
                        "data" => "$kemarin_lusa[persen], ".(100-$kemarin_lusa['persen']),
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