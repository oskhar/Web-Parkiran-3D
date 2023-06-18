<?php

try {

    // KELOLA DATA ADMIN
    if (isset($_POST['id'])) {

            // Mengganti username dan password
        $sql = "UPDATE admin SET username='$_POST[username]', password='$_POST[password]' WHERE id=$_POST[id]";
        mysqli_query($conn, $sql);
        
            // Memunculkan notifikasi pop up
        $pesan = array(
            "text" => "Data berhasil diubah ✅",
            "background" => "var(--sucess)"
        );
        include "widget/popup_biasa.php";

    } else if (isset($_POST['username'])) {

            // Menambahkan data
        $sql = "INSERT INTO admin VALUES(0, '$_POST[username]', '$_POST[password]')";
        mysqli_query($conn, $sql);

            // Memunculkan notifikasi pop up
        $pesan = array(
            "text" => "Data berhasil ditambahkan ✅",
            "background" => "var(--sucess)"
        );
        include "widget/popup_biasa.php";

    } else if (isset($_GET['hapus_id'])) {

            // Menghapus data
        $sql = "DELETE FROM admin WHERE id=$_GET[hapus_id]";
        mysqli_query($conn, $sql);

            // Memunculkan notifikasi pop up
        $pesan = array(
            "text" => "Data berhasil dihapus ✅",
            "background" => "var(--warning)"
        );
        include "widget/popup_biasa.php";

    }

    // Mengambil banyaknya baris pada tabel user
    $search = "";
    if (isset($_GET['search']))
        $search = $_GET['search'];
    $sql = "SELECT * FROM admin WHERE username LIKE '%$search%' OR username LIKE '%$search' OR username LIKE '$search%' OR username LIKE '$search'";
    $result = mysqli_query($conn, $sql);
    $len_data = mysqli_num_rows($result);
    $page_tabel = 0;

    // Menambahkan limit untuk tabel yang akan ditampilkan
    if (isset($_GET['limit']))
        $page_tabel = $_GET['limit'];
    $limit = $len_data - ($page_tabel*15) >= 15 ? 15 : $len_data - ($page_tabel*15);
    $pembagian = $len_data/15;

    // Mengambil data sesuai baris
    $sql = "SELECT * FROM admin WHERE username LIKE '%$search%' OR username LIKE '%$search' OR username LIKE '$search%' OR username LIKE '$search' LIMIT ".($page_tabel * 15).", ".$limit;
    $result = mysqli_query($conn, $sql);
    
} catch (\Throwable $er) {
    echo (" (akunadmin.php) pesan: " . $er);

}

?>