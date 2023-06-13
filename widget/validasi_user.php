<?php

try {

    $validasi = false;
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $validasi = true;
        }
    }
    
} catch (\Throwable $er) {
    echo (" (validasi_user.php) pesan: " . $er);

}

?>