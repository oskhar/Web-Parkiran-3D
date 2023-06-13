<?php

try {

    // Mengambil banyaknya baris pada tabel user
    $search = "";
    if (isset($_GET['search']))
        $search = $_GET['search'];
    $sql = "SELECT * FROM user WHERE username LIKE '%$search%' OR username LIKE '%$search' OR username LIKE '$search%' OR username LIKE '$search'";
    $result = mysqli_query($conn, $sql);
    $len_data = mysqli_num_rows($result);
    $page_tabel = 0;

    // Menambahkan limit untuk tabel yang akan ditampilkan
    if (isset($_GET['limit']))
        $page_tabel = $_GET['limit'];
    $limit = $len_data - ($page_tabel*15) >= 15 ? 15 : $len_data - ($page_tabel*15);
    $pembagian = $len_data/15;

    // Mengambil data sesuai baris
    $sql = "SELECT * FROM user WHERE username LIKE '%$search%' OR username LIKE '%$search' OR username LIKE '$search%' OR username LIKE '$search' LIMIT ".($page_tabel * 15).", ".$limit;
    $result = mysqli_query($conn, $sql);
    
} catch (\Throwable $er) {
    echo (" (dashboard.php) pesan: " . $er);

}

?>
<link rel="stylesheet" href="style/styleDas.css">

<!-- JUDUL -->
<h1>Dashboard</h1>

<!-- LATAR -->
<div class="latar">

    <!-- TABEL -->
    <div id="tabel">
        <table>
            <tr style="font-weight:bold;">
                <td>ID</td>
                <td>USERNAME</td>
                <td>PASSWORD</td>
                <td colspan="2">AKSI</td>
                <td>STATUS</td>
            </tr>
            <?php $i = ($page_tabel*15+1); while ($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><?= $i; ?></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><?= $data['username'] ?></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><?= $data['password'] ?></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><a href="?page=edituser&username=<?= $data['username'] ?>&password=<?= $data['password'] ?>">edit</a></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><a href="">hapus</a></td>
                    <td>Unactive</td>
                </tr>
            <?php $i++; endwhile; ?>
        </table>
        <!-- Membuat tombol pagination untuk melihat data selebihnya -->
        <div id="pagination">
            <button><</button>
            <?php for($i = 0; $i < $pembagian; $i++): ?>
                <a href="?limit=<?= $i ?>&search=<?php if (isset($_GET['search'])) echo $_GET['search'] ?>"><button <?php if($page_tabel == $i) echo "id='paginSelected'"; ?>><?= $i+1 ?></button></a>
            <?php endfor; ?>
            <button>></button>
        </div>
    </div>

    <!-- GRAFIK -->
    <div id="tambahan">
        <div class="grafik">
            <?php 

            // MENGAMBIL DATA PARKIR DARI DATABASE
            $result = mysqli_query($conn, "SELECT tanggal,jumlah FROM data_parkir ORDER BY id DESC LIMIT 7");
            $data_grafik = array(
                "label" => [],
                "data" => []
            );
            while ($data = mysqli_fetch_assoc($result)) {
                array_push($data_grafik['label'], $data['tanggal']);
                array_push($data_grafik['data'], $data['jumlah']);
            }
            // MENGUBAH MASING MASING BARIS DATA BERDASARKAN KOLOM MENJADI OBJEK
            $data_bar = [
                "label" => array_reverse($data_grafik['label']),
                "judul" => "Jumlah Pengendara Parkir 2023",
                "data" => array_reverse($data_grafik['data']),
                "color" => "#ECAFFF"
            ];

            // MENAMBAHKAN GRAFIK
            include "widget/chart_bar.php";
            
            ?>
        </div>
        <div id="penjelasan">
            <h3>Penjelasan singkat</h3>
            Tempat yang parkir selama satu minggu ini memiliki rata rata pengendara yang parkir sebanyak <?= number_format(array_sum($data_grafik['data'])/7, 0) ?>
        </div>
    </div>
</div>