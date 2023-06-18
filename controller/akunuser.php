<?php

try {
    if(isset($_GET['id'])){

        // List untuk tampilan status
        $list_status = ["🔴", "🟢"];

        // Mengambil data user
        $sql = "SELECT * FROM user WHERE id=$_GET[id]";
        $result_user = mysqli_query($conn, $sql);
        $data_user = mysqli_fetch_array($result_user);

        // Mengambil data plat nomor
        $sql = "SELECT * FROM plat_nomor WHERE id=$_GET[id]";
        $result_plat = mysqli_query($conn, $sql);

    } else {
        header("Location: bundle.php?page=dashboard");
    }
} catch (\Throwable $er) {
    echo (" (akunuser.php) pesan: " . $er);

}

?>