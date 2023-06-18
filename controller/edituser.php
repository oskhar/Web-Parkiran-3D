<?php

try {

    // Mendeteksi apakah ada data username pada post
    if (isset($_POST['username'])) {

        // Mendapatkan apakah username yang ingin digunakan sudah terdaftar
        $sql = "SELECT * FROM user WHERE username='$_POST[username]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $pesan = array(
                "text" => "Username sudah digunakan, silahkan gunakan username yang lain",
                "background" => "var(--danger)"
            );
            include "widget/popup_biasa.php";
        } else {
            $sql = "UPDATE user SET username='$_POST[username]', password='$_POST[password]' WHERE id=$_POST[id]";
            if(mysqli_query($conn, $sql)) {

                $pesan = array(
                    "text" => "Username dan password berhasil diganti",
                    "background" => "var(--sucess)",
                    "link" => "bundle.php?page=dashboard"
                );
                include "widget/popup_pindah.php";

            } else {

                $pesan = array(
                    "text" => "Data tidak salah atau error !",
                    "background" => "var(--danger)"
                );
                include "widget/popup_biasa.php";

            }
        }
    }

    $sql = "SELECT * FROM user WHERE id=$_GET[id]";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    
} catch (\Throwable $er) {
    echo (" (edituser.php) pesan: " . $er);

}

?>