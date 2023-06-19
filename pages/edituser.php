<?php

session_start();
include "../widget/koneksi.php"; 
$notif = false;

try {

    // PROSES LOGOUT
    if (isset($_GET["logout"])) {
        $pesan = array(
            "text" => "Anda telah berhasil logout ✅",
            "background" => "var(--sucess)",
            "link" => "../widget/logout.php"
        );
        $notif_logout = true;
    }

    // VALIDASI USER LOGIN DARI SESSION YANG TERSIMPAN
    include "../widget/validasi_user.php";
    if (!$validasi) {
        header("Location: loginUser.php");
    }

    // Mendeteksi apakah ada data username pada post
    if (isset($_POST['username'])) {

        // Mendapatkan apakah username yang ingin digunakan sudah terdaftar
        $sql = "SELECT * FROM user WHERE username='$_POST[username]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0 && $_POST['password'] == $_SESSION['password']) {
            $pesan = array(
                "text" => "Username sudah digunakan, silahkan gunakan username yang lain",
                "background" => "var(--danger)"
            );
            $notif = true;
        } else {
            $sql = "UPDATE user SET username='$_POST[username]', password='$_POST[password]' WHERE id=$_SESSION[id]";
            if(mysqli_query($conn, $sql)) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];

                $pesan = array(
                    "text" => "Username dan password berhasil diganti",
                    "background" => "var(--sucess)"
                );
                $notif = true;

            } else {

                $pesan = array(
                    "text" => "Data salah atau error !",
                    "background" => "var(--danger)"
                );
                $notif = true;

            }
        }
    }
    
} catch (\Throwable $er) {
    echo (" (edituser.php) pesan: " . $er);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../widget/warna.php" ?>
    <link rel="stylesheet" href="../style/edit_user.css">
    <link href="../assets/images/lightmode.jpg" alt="iniGambar" rel="icon" type="image/x-icon">
    <style>
        #logout{
            background-color: transparent;
            border: none;
            position: fixed;
            right: 50px;
            top: 30px;
        }
        #logout p {
            background-color: var(--danger);
            height: 30px;
            line-height: 30px;
            border-radius: 5px;
            font-weight: bold;
            margin-right: 10px;
            padding: 5px;
            padding-inline: 20px;
            color: var(--w4);
        }
    </style>
    <title>Edit Akun User</title>
</head>
<body style="background: var(--w2);">
    <?php if($notif) include "../widget/popup_biasa.php" ?>
    <?php if($notif_logout) include "../widget/popup_pindah.php" ?>
    <!-- FORM INPUT DATA -->
    <form method="post" class="background">
        <div class="latar">
            <h1>Data Akun User</h1>

            <!-- INPUT USERNAME -->
            <div class="form_4">
                <input name="username" class="input_4" placeholder="Username" required type="text" value="<?= $_SESSION['username'] ?>">
                <span class="input-border_4"></span>
            </div>

            <!-- INPUT PASSWORD -->
            <div class="form_3">
                <input name="password" class="input_3" placeholder="Password" required type="text" value="<?= $_SESSION['password'] ?>">
                <span class="input-border_3"></span>
            </div>

            <!-- TOMBOL SAVE DAN KEMBALI -->
            <div class="tombol_edituser">
                <button type="reset">RESET</button>
                <button type="submit">SAVE</button>
            </div>
        </div>

    </form>

    <button onclick="window.location.href='?logout=s';" id="logout"><p>Logout</p></button>
    <!-- TOMBOL KEMBALI KE HALAMAN UTAMA -->
    <a href="akunuser.php"><button id="kembali"><<</button></a>
</body>
</html>