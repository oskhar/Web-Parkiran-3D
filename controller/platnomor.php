<?php

try {

    // Array status
    $list_status = ["🔴", "🟢"];

    // Izin untuk memasukan plat nomer
    $boleh_memasukan_plat = true;

    // Mendapatkan waktu saat ini
    $waktu_saat_ini = date("Y-m-d H:i:s");
    $tanggal_saat_ini = date("Y-m-d");

    // Mengambil data user
    $sql = "SELECT * FROM user";
    $result_user = mysqli_query($conn, $sql);

    // Menambah data
    if (isset($_POST["plat_tambah"])) {

        // Deklarasi
        $user = $_POST["user"];
        $plat_tambah = strtoupper(str_replace(' ', '', $_POST["plat_tambah"]));
        if ($_POST["user"] == "baru") {
            $sql = "INSERT INTO user VALUES (0, '$plat_tambah', '$plat_tambah')";
            mysqli_query($conn, $sql);

            $sql = "SELECT id FROM user WHERE username='$plat_tambah'";
            $result_tambah_plat = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result_tambah_plat)['id'];
        }
        $sql = "SELECT * FROM plat_nomor WHERE nomor='$plat_tambah'";
        $result_tambah_plat = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result_tambah_plat) > 0) {

            $pesan = array(
                "text" => "Plat nomor sudah ada, tambahkan plat lain !!",
                "background" => "var(--danger)"
            );
            include "widget/popup_biasa.php";

        } else {
            
            // Mendapatkan jumalh dari data_parkir pada hari ini
            $sql = "SELECT jumlah FROM data_parkir WHERE tanggal='$tanggal_saat_ini'";
            $result_jumlah_data = mysqli_query($conn, $sql);
            $jumlah_data_sekarang = mysqli_fetch_array(mysqli_query($conn, $sql))['jumlah']+1;

            // Menambahkan satu plat nomor pada data_parkiran
            $sql = "UPDATE data_parkir SET jumlah=$jumlah_data_sekarang WHERE tanggal='$tanggal_saat_ini'";
            $result_jumlah_data = mysqli_query($conn, $sql);

            // Menambahkan data plat_nomor
            $sql = "INSERT INTO plat_nomor VALUES ('$plat_tambah', $user, $_POST[lantai], $_POST[lokasi], 1, '$waktu_saat_ini', 'belum keluar')";
            mysqli_query($conn, $sql);

            $sql = "UPDATE spot_parkir SET status=1 WHERE lantai=$_POST[lantai] AND lokasi=$_POST[lokasi]";
            mysqli_query($conn, $sql);
            $pesan = array(
                "text" => "Plat nomor berhasi ditambahkan ✅",
                "background" => "var(--sucess)"
            );
        }
    }

    // Memeriksa apakah plat sudah parkir
    if (isset($_GET['plat'])) {

        // Mendapatkan data status dari plat nomor
        $sql = "SELECT status FROM plat_nomor WHERE nomor='$_GET[plat]'";
        $result_check_plat = mysqli_query($conn, $sql);
        $check_plat = mysqli_fetch_array($result_check_plat)["status"];

        // Check status plat
        if ($check_plat == 1) {
            
            $boleh_memasukan_plat = false;
            $pesan = array(
                "text" => "Tidak bisa memasukan plat yang sudah parkir !!",
                "background" => "var(--danger)",
                "link" => "?page=platnomor"
            );
            include "widget/popup_pindah.php";

        }

    }

    // Memasukan plat nomor ke tempat parkir
    if (isset($_POST['plat_masuk'])) {

        // Mengubah status dan waktu masuk pada tabel plat_nomor
        $sql = "UPDATE plat_nomor SET lantai=$_POST[lantai], lokasi=$_POST[lokasi], waktu_masuk='$waktu_saat_ini', waktu_keluar='belum keluar', status=1 WHERE nomor='$_POST[plat_masuk]'";
        mysqli_query($conn, $sql);

        // Mengubah status pada tabel slot_parkir
        $sql = "UPDATE spot_parkir SET status=1 WHERE lantai=$_POST[lantai] AND lokasi=$_POST[lokasi]";
        mysqli_query($conn, $sql);

        // Memunculkan pop up
        $pesan = array(
            "text" => "Plat nomer sudah dimasukan ke dalam tempat parkir ✅",
            "background" => "var(--sucess)",
            "link" => "?page=platnomor"
        );
        include "widget/popup_pindah.php";

    }

    // Keluarkan plat nomor dari tempat parkir
    if (isset($_GET['plat_keluar'])) {

        // Mendapatkan data status dari plat nomor
        $sql = "SELECT status FROM plat_nomor WHERE nomor='$_GET[plat_keluar]'";
        $result_check_plat = mysqli_query($conn, $sql);
        $check_plat = mysqli_fetch_array($result_check_plat)["status"];

        // Check status plat
        if ($check_plat == 0) {
            
            // Memunculkan pop up
            $pesan = array(
                "text" => "Tidak bisa mengeluarkan plat yang tidak parkir !!",
                "background" => "var(--danger)",
                "link" => "?page=platnomor"
            );
            include "widget/popup_pindah.php";

        } else {

            // Mengubah status dan waktu keluar pada tabel plat_nomor
            $sql = "UPDATE plat_nomor SET waktu_keluar='$waktu_saat_ini', status=0 WHERE nomor='$_GET[plat_keluar]'";
            mysqli_query($conn, $sql);

            // Mengubah status pada tabel slot_parkir
            $sql = "UPDATE spot_parkir SET status=0 WHERE lantai=$_GET[lantai] AND lokasi=$_GET[lokasi]";
            mysqli_query($conn, $sql);

            // Memunculkan pop up
            $pesan = array(
                "text" => "Motor sudah dikeluarkan dari tempat parkir ✅",
                "background" => "var(--sucess)",
                "link" => "?page=platnomor"
            );
            include "widget/popup_pindah.php";

        }

    }


    // Keluarkan plat nomor dari tempat parkir
    if (isset($_GET['plat_hapus'])) {

        // Mengubah status pada tabel slot_parkir
        $sql = "UPDATE spot_parkir SET status=0 WHERE lantai=$_GET[lantai] AND lokasi=$_GET[lokasi]";
        mysqli_query($conn, $sql);

        // Mendapatkan data status dari plat nomor
        $sql = "DELETE FROM plat_nomor WHERE nomor='$_GET[plat_hapus]'";
        if (mysqli_query($conn, $sql)) {

            // Memunculkan pop up
            $pesan = array(
                "text" => "Plat nomer yang dipilih berhasil dihapus ✅",
                "background" => "var(--warning)"
            );
            include "widget/popup_biasa.php";

        } else {
            
            // Memunculkan pop up
            $pesan = array(
                "text" => "Tidak bisa menghapus plat yang dipilih !",
                "background" => "var(--danger)"
            );
            include "widget/popup_biasa.php";

        }

    }

    // Mengambil banyaknya baris pada tabel user
    $search = "";

    if (isset($_GET['search']))
        $search = $_GET['search'];

    $sql = "SELECT * FROM plat_nomor WHERE nomor LIKE '%$search%' OR nomor LIKE '%$search' OR nomor LIKE '$search%' OR nomor LIKE '$search'";
    $result = mysqli_query($conn, $sql);
    $len_data = mysqli_num_rows($result);
    $page_tabel = 0;

    // Menambahkan limit untuk tabel yang akan ditampilkan
    if (isset($_GET['limit'])) {
        $page_tabel = $_GET['limit'];
    }

    $limit = $len_data - ($page_tabel*10) >= 10 ? 10 : $len_data - ($page_tabel*10);
    $pembagian = $len_data/10;

    // Mengambil data sesuai baris
    $sql = "SELECT * FROM plat_nomor WHERE nomor LIKE '%$search%' OR nomor LIKE '%$search' OR nomor LIKE '$search%' OR nomor LIKE '$search' ORDER BY `status` DESC, `lantai`, `lokasi` LIMIT ".($page_tabel * 10).", $limit";
    $result_plat = mysqli_query($conn, $sql);
    
    // Mengambil data user
    $lantai = "0";
    
    if (isset($_GET['lt'])) {
        $lantai = $_GET['lt']-1;
    }
    
    $tempat_tersedia = array([], [], []);
    $sql = "SELECT * FROM spot_parkir WHERE `status`=0";
    $result_spot_parkir = mysqli_query($conn, $sql);

    while($data=mysqli_fetch_assoc($result_spot_parkir)) {
        array_push($tempat_tersedia[$data["lantai"]], (int)$data["lokasi"]);
    }
    
} catch (\Throwable $er) {
    echo (" (platnomor.php) pesan: " . $er);

}
?>