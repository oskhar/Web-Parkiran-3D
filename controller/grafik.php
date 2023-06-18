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