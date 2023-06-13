<?php

try {

    include "koneksi.php";
    for ($x=0; $x < 3; $x++) { 
        for ($i=0; $i < 28; $i++) {
            $sql = "INSERT INTO spot_parkir VALUES (0, $i, $x, 0)";
            mysqli_query($conn, $sql);
        }
    }
    
} catch (\Throwable $er) {
    echo (" (reset_data_plat_nomor.php) pesan: " . $er);

}

?>