<?php

try {

    // KELOLA DATA ADMIN
    if (isset($_POST['id'])) {

            // Mengganti username dan password
        $sql = "UPDATE admin SET username='$_POST[username]', password='$_POST[password]' WHERE id=$_POST[id]";
        mysqli_query($conn, $sql);
        
            // Memunculkan notifikasi pop up
        $pesan = array(
            "text" => "Data berhasil diubah ✅",
            "background" => "var(--sucess)"
        );
        include "widget/popup_biasa.php";

    } else if (isset($_POST['username'])) {

            // Menambahkan data
        $sql = "INSERT INTO admin VALUES(0, '$_POST[username]', '$_POST[password]')";
        mysqli_query($conn, $sql);

            // Memunculkan notifikasi pop up
        $pesan = array(
            "text" => "Data berhasil ditambahkan ✅",
            "background" => "var(--sucess)"
        );
        include "widget/popup_biasa.php";

    } else if (isset($_GET['hapus_id'])) {

            // Menghapus data
        $sql = "DELETE FROM admin WHERE id=$_GET[hapus_id]";
        mysqli_query($conn, $sql);

            // Memunculkan notifikasi pop up
        $pesan = array(
            "text" => "Data berhasil dihapus ✅",
            "background" => "var(--warning)"
        );
        include "widget/popup_biasa.php";

    }

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
<link rel="stylesheet" href="style/akun_admin.css">

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
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><a href="?page=akunadmin&username=<?= $data['username'] ?>&password=<?= $data['password'] ?>&id=<?= $data['id'] ?>">edit</a></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><a href="?page=akunadmin&hapus_id=<?= $data['id'] ?>">hapus</a></td>
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
        <form id="edit_admin" method="post" action="?page=akunadmin">
            <?php if(isset($_GET['username']) && isset($_GET['username'])): ?>

                <h2>Edit Akun</h2>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

                <div id="bungkus_input">
                    <div>
                        <label for="username">username</label>
                        <input required type="text" name="username" id="username" value="<?= $_GET['username'] ?>">
                    </div>
                    <div>
                        <label for="password">password</label>
                        <input required type="text" name="password" id="password" value="<?= $_GET['password'] ?>">
                    </div>
                </div>

                <button type="submit">ubah</button>
            <?php else: ?>
                <div id="peringatan_edit_admin">Click tombol <b style="color:var(--w5)">edit</b> pada akun yang ingin anda edit</div>
            <?php endif; ?>
        </form>

        <form id="tambah_admin" method="post">
            <?php if(isset($_GET['username']) && isset($_GET['username'])): ?>
                <div id="peringatan_edit_admin">Tidak bisa menambahkan data saat sedang mengedit data</div>
                <center>
                    <button type="button" onclick="window.location.href='?page=akunadmin'">Tambah Akun</button>
                </center>
            <?php else: ?>
                <h2>Tambah Akun</h2>

                <div id="bungkus_input">
                    <div>
                        <label for="username">username</label>
                        <input required type="text" name="username" id="username">
                    </div>
                    <div>
                        <label for="password">password</label>
                        <input required type="text" name="password" id="password">
                    </div>
                </div>
                <button type="submit">tambah</button>
            <?php endif; ?>

        </form>
    </div>
</div>