<?php

// FUNGSI YANG AKAN MEMILIH TEMPAT PARKIR SECARA RANDOM
function pilihTempatTersedia($array)
{
    try {
        
        $lantai_random = rand(0, 2);
        $lokasi_random = rand(0, 27);
        if (!isset($array[$lantai_random][$lokasi_random])) {
            pilihTempatTersedia($array);

        }

        unset($array[$lantai_random][$lokasi_random]);
        return array(
            "hasil" => [$lantai_random, $lokasi_random],
            "array" => $array
        );
        
    } catch (\Throwable $er) {
        echo (" (reset_data_plat_nomor.php) pesan: " . $er);
    
    }
}

// MEMILIH ANGKA RANDOM YANG TIDAK SAMA
function pilihRandom($histori_plat)
{
    $nomor_plat = rand(1000, 9999);
    if (in_array($nomor_plat, $histori_plat)) {
        pilihRandom($histori_plat);
    }
    array_push($histori_plat, $nomor_plat);
    return array(
        "hasil" => $nomor_plat,
        "array" => $histori_plat
    );
}

try {

    include "koneksi.php";

    // MENGAMBIL DATA DARI TABEL USER
    $id_pemilik_plat = [];
    $sql = "SELECT id FROM user";
    $result = mysqli_query($conn, $sql);
    
    // MEMASUKAN DATA ID USER KE DALAM ARRAY
    while ($data = mysqli_fetch_assoc($result)) {
        array_push($id_pemilik_plat, $data['id']);
    }
    var_dump($id_pemilik_plat);
    $histori_plat = array();
    $lokasi_tersedia = array(
        range(0, 27),
        range(0, 27),
        range(0, 27)
    );

    // MEMASUKAN DATA RANDOM YANG SESUAI KE DATABASE
    for ($i=1; $i <= 39; $i++) { 
        $memilih_angka_random = pilihRandom($histori_plat);
        $angka_random = $memilih_angka_random['hasil'];
        $histori_plat = $memilih_angka_random['array'];
        $memilih_lokasi = pilihTempatTersedia($lokasi_tersedia);
        $lokasi_tersedia = $memilih_lokasi['array'];
        $lokasi_dipilih = $memilih_lokasi['hasil'];
        $index = rand(0, count($id_pemilik_plat)-1);
        $sql = "INSERT INTO plat_nomor VALUES ('B".$angka_random."ABC', ".$id_pemilik_plat[$index].", $lokasi_dipilih[0], $lokasi_dipilih[1])";
        echo $sql . "<br>";
        mysqli_query($conn, $sql);
    }
    
} catch (\Throwable $er) {
    echo (" (reset_data_plat_nomor.php) pesan: " . $er);

}

?>