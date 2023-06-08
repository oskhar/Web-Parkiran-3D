<?php

include "koneksi.php";
for ($i=1; $i <= 20; $i++) { 
    $angka = rand(5, 72);
    $sql = "INSERT INTO data_parkir VALUES (0, '$i juni', ".$angka.")";
    mysqli_query($conn, $sql);
}

?>