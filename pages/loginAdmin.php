<?php

session_start();
include "../widget/koneksi.php";

// MENYIAPKAN NOTIFIKASI BESERTA PESANNYA
$notif = false;
$pesan = array(
    "text" => "Username atau Password salah !!!",
    "background" => "var(--danger)"
);

try {

    // VALIDASI USER LOGIN
    if (isset($_POST['username'])) {

            // Mengambil data dari tabel user
        $sql = "SELECT * FROM admin WHERE username='$_POST[username]' AND password='$_POST[password]'";
        $result = mysqli_query($conn, $sql);

            // Cek apakah user dan password sesuai
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['admin'] = true;
            header("Location: ../bundle.php");
        } else {
            $notif = true;
        }

    } else {

        // VALIDASI USER LOGIN DARI SESSION YANG TERSIMPAN
        include "../widget/validasi_admin.php";
        if ($validasi) {
            header("Location: ../bundle.php");
        }

    }

} catch (\Throwable $er) {
    echo (" (loginAdmin.php) pesan: " . $er);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login User</title>
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>

    <!-- MENAMBAHKAN POPUP JIKA DIPERLUKAN -->
    <?php if($notif) include "../widget/popup_biasa.php"; ?>

    <!-- CONTAINER -->
    <div class="form-container">
        <p class="title">Login Admin 🔒</p>
        <form class="form" method="POST">

            <!-- INPUT USERNAME -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="">
            </div>

            <!-- INPUT PASSWORD -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="">
                <br><br><br><br>
                </div>

            <!-- TOMBOL SUBMIT -->
            <button class="sign" type="submit">Login</button>
        </form>

        <!-- TOMBOL LOGIN SEBAGAI ADMIN -->
        <div class="social-message">
            <div class="line"></div>
            <p class="message"><a href="loginUser.php">Login Sebagai User</a></p>
            <div class="line"></div>
        </div>
    </div>

    <!-- TOMBOL KEMBALI KE HALAMAN UTAMA -->
    <a href=".."><button id="kembali"><<</button></a>
</body>
</html>