<?php

try {

    // Mengambil banyaknya baris pada tabel user
    $search = "";
    if (isset($_GET['search']))
        $search = $_GET['search'];
    $sql = "SELECT * FROM admin WHERE username LIKE '%$search%' OR username LIKE '%$search' OR username LIKE '$search%' OR username LIKE '$search'";
    $result = mysqli_query($conn, $sql);
    $len_data = mysqli_num_rows($result);
    $page_tabel = 0;

    // Menambahkan limit untuk tabel yang akan ditampilkan
    if (isset($_GET['limit']))
        $page_tabel = $_GET['limit'];
    $limit = $len_data - ($page_tabel*15) >= 15 ? 15 : $len_data - ($page_tabel*15);
    $pembagian = $len_data/15;

    // Mengambil data sesuai baris
    $sql = "SELECT * FROM admin WHERE username LIKE '%$search%' OR username LIKE '%$search' OR username LIKE '$search%' OR username LIKE '$search' LIMIT ".($page_tabel * 15).", ".$limit;
    $result = mysqli_query($conn, $sql);
    
} catch (\Throwable $er) {
    echo (" (akunadmin.php) pesan: " . $er);

}

?>
<link rel="stylesheet" href="style/styleAkunAdmin.css">

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
            </tr>
            <!-- Perulangan untuk mengambil seluruh data user dari database -->
            <?php $i = ($page_tabel*15+1); while ($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><?= $i; ?></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><?= $data['username'] ?></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><?= $data['password'] ?></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><a href="">edit</a></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><a href="">hapus</a></td>
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

    <!-- GRAFIK BESERTA PENJELASAN -->
    <div id="tambahan">
        <div class="grafik">
        </div>
        <div id="penjelasan">
        </div>
    </div>
</div>