<?php

try {

    // Menghapus data user
    if (isset($_GET['id_hapus'])) {
        $sql_user = "DELETE FROM user WHERE id=$_GET[id_hapus]";
        $sql_plat_nomor = "DELETE FROM plat_nomor WHERE id=$_GET[id_hapus]";
        if (mysqli_query($conn, $sql_user) && mysqli_query($conn, $sql_plat_nomor)) {
            $pesan = array(
                "text" => "Data berhasi dihapus",
                "background" => "var(--warning)"
            );
            include "widget/popup_biasa.php";
        } else {
            $pesan = array(
                "text" => "Data gagal dihapus",
                "background" => "var(--danger)"
            );
            include "widget/popup_biasa.php";
        }
    }

    // Mengambil banyaknya baris pada tabel user
    $search = "";
    if (isset($_GET['search']))
        $search = $_GET['search'];
    $sql = "SELECT * FROM user WHERE username LIKE '%$search%' OR username LIKE '%$search' OR username LIKE '$search%' OR username LIKE '$search'";
    $result = mysqli_query($conn, $sql);
    $len_data = mysqli_num_rows($result);
    $page_tabel = 0;

    // Menambahkan limit untuk tabel yang akan ditampilkan
    if (isset($_GET['limit']))
        $page_tabel = $_GET['limit'];
    $limit = $len_data - ($page_tabel*10) >= 10 ? 10 : $len_data - ($page_tabel*10);
    $pembagian = $len_data/10;

    // Mengambil data sesuai baris
    $sql = "SELECT * FROM user WHERE username LIKE '%$search%' OR username LIKE '%$search' OR username LIKE '$search%' OR username LIKE '$search' LIMIT ".($page_tabel * 10).", ".$limit;
    $result = mysqli_query($conn, $sql);
    
} catch (\Throwable $er) {
    echo (" (dashboard.php) pesan: " . $er);

}

?>