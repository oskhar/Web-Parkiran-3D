<link rel="stylesheet" href="style/akun_admin.css">
<script src="script/akunadmin.js"></script>

<!-- JUDUL -->
<h1>Akun Admin</h1>

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
                    <td><?= $i; ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['password'] ?></td>
                    <td><a href="?page=akunadmin&username=<?= $data['username'] ?>&password=<?= $data['password'] ?>&id=<?= $data['id'] ?>">edit</a></td>
                    <td><a onclick="hapus_admin('<?= $data['id'] ?>', '<?= $data['username'] ?>')">hapus</a></td>
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