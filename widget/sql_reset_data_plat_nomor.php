<?php

// FUNGSI YANG AKAN MEMILIH TEMPAT PARKIR SECARA RANDOM
function pilihTempatTersedia($array)
{
    try {
        
        $angka_random = rand(1, 84);
        if (isset($array[$angka_random])) {

            $hasil = $array[$angka_random];
            unset($array[$angka_random]);
            return array(
                "hasil" => $hasil,
                "array" => $array
            );

        } else {
            pilihTempatTersedia($array);

        }

    } catch (\Throwable $er) {
        echo (" (reset_data_plat_nomor.php) pesan: " . $er);
    
    }
}
try {

    include "koneksi.php";

    // MENGAMBIL DATA DARI TABEL USER
    $id_pemilik_plat = [];
    $sql = "SELECT id FROM user";
    $result = mysqli_query($conn, $sql);
    $lokasi_tersedia = range(1, 84);

    // MEMASUKAN DATA ID USER KE DALAM ARRAY
    while ($data = mysqli_fetch_assoc($result)) {
        array_push($id_pemilik_plat, $data['id']);
    }

    // MEMASUKAN DATA RANDOM YANG SESUAI KE DATABASE
    for ($i=1; $i <= 39; $i++) { 
        $index = rand(0, count($id_pemilik_plat));
        $nomor_plat = rand(1000, 9999);
        $memilih = pilihTempatTersedia($lokasi_tersedia);
        $lokasi_tersedia = $memilih['array'];
        $lokasi_dipilih = $memilih['hasil'];
        $sql = "INSERT INTO plat_nomor VALUES ('B".$nomor_plat."ABC', ".$id_pemilik_plat[$index].", $lokasi_dipilih)";
        echo($sql);
        mysqli_query($conn, $sql);
    }
    
} catch (\Throwable $er) {
    echo (" (reset_data_plat_nomor.php) pesan: " . $er);

}

?>