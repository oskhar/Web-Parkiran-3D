<link rel="stylesheet" href="style/dashboard.css">

<!-- JUDUL -->
<h1>Dashboard</h1>

<!-- LATAR -->
<div class="latar">

    <!-- TABEL -->
    <div id="tabel">
        <div id="tabel_isi">
            <h3>Data User</h3>
            <table>
                <tr style="font-weight:bold;">
                    <td>ID</td>
                    <td>USERNAME</td>
                    <td>PASSWORD</td>
                    <td>JUMLAH PLAT</td>
                    <td colspan="3">AKSI</td>
                </tr>
                <?php $i = ($page_tabel*10+1); while ($data = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data['username'] ?></td>
                        <td><?= $data['password'] ?></td>
                        <td><?= mysqli_num_rows(mysqli_query($conn, "SELECT id FROM plat_nomor WHERE id=$data[id]")) ?></td>
                        <td><a href="?page=akunuser&id=<?= $data['id'] ?>">platnomor</a></td>
                        <td><a href="?page=edituser&id=<?= $data['id'] ?>">edit</a></td>
                        <td><a onclick="hapus_user('<?= ($data['id']) ?>', '<?= ($data['username']) ?>')">hapus</a></td>
                    </tr>
                <?php $i++; endwhile; ?>
            </table>
        </div>
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
            Pengendara yang parkir selama satu minggu ini memiliki rata rata pengendara yang parkir sebanyak <?= number_format(array_sum($data_grafik['data'])/7, 0) ?> pengendara... <a href="bundle.php?page=grafik" style="color:var(--w5)">Lihat lengkap..</a>
        </div>
    </div>
</div>
<script src="script/dashboard.js"></script>