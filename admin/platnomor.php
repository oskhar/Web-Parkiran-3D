<link rel="stylesheet" href="style/plat_nomor.css">

<!-- JUDUL -->
<h1>Plat Nomor</h1>

<!-- BAGIAN LATAR -->
<div class="latarBlkng">

    <!-- BAGIAN TABEL -->
    <div id="tabel">
        <table>
            <tr style="font-weight:bold;">
                <td>ID</td>
                <td>PLAT</td>
                <td>LOKASI</td>
                <td>WAKTU MASUK</td>
                <td>WAKTU KELUAR</td>
                <td>STATUS</td>
                <td colspan="4">AKSI</td>
            </tr>
            <?php $i = ($page_tabel*10+1); while ($data = mysqli_fetch_assoc($result_plat)): ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['nomor'] ?></td>
                    <td>LT<?= $data['lantai']+1 ?> - Area <?= $data['lokasi']+1 ?></td>
                    <td><?= $data['waktu_masuk'] ?></td>
                    <td><?= $data['waktu_keluar'] ?></td>
                    <td><?= $list_status[$data['status']] ?></td>
                    <td><a href="index.php?lt=<?= $data['lantai'] ?>&loc=<?= $data['lokasi'] ?>">lokasi</a></td>
                    <td><a href="bundle.php?page=platnomor&plat=<?= $data['nomor'] ?>">masuk</a></td>
                    <td><a href="bundle.php?page=platnomor&plat_keluar=<?= $data['nomor'] ?>&lantai=<?= $data['lantai'] ?>&lokasi=<?= $data['lokasi'] ?>">keluar</a></td>
                    <td><a onclick="hapus_plat('<?= $data['nomor'] ?>', '<?= $data['lantai'] ?>', '<?= $data['lokasi'] ?>');">hapus</a></td>
                </tr>
            <?php $i++; endwhile; ?>
        </table>
        <div id="pagination">
            <button><</button>
            <?php for($i = 0; $i < $pembagian; $i++): ?>
                <a href="?page=platnomor&limit=<?= $i ?>&search=<?php if (isset($_GET['search'])) echo $_GET['search'] ?>"><button <?php if($page_tabel == $i) echo "id='paginSelected'"; ?>><?= $i+1 ?></button></a>
            <?php endfor; ?>
            <button>></button>
        </div>
    </div>

    <div id="tambahan">
        <!-- BAGIAN MENAMBAHKAN PLAT -->
        <form class="TambahPlat" method="post">
            <h3>MENAMBAH PLAT NOMER</h3>
            <input id="input_text" type="text" name="plat_tambah" required>
            <div class="tombolPlat">
                <div>
                    <p>Pilih Lantai</p>
                    <input type="radio" id="LT1" name="lantai" value="0" onclick="clickRadioTambah(0)" checked>
                    <label for="LT1">Lantai 1</label>
                    <input type="radio" id="LT2" name="lantai" value="1" onclick="clickRadioTambah(1)">
                    <label for="LT2">Lantai 2</label>
                    <input type="radio" id="LT3" name="lantai" value="2" onclick="clickRadioTambah(2)">
                    <label for="LT3">Lantai 3</label>
                </div><br>
                <select name="user" id="tambah_user" required>
                    <option value="" selected disabled>Pilih User..</option>
                        <option value="baru">Akun Baru</option>
                    <?php while($data=mysqli_fetch_assoc($result_user)): ?>
                        <option value="<?= $data['id'] ?>"><?= $data['username'] ?></option>
                    <?php endwhile; ?>
                </select>
                <select name="lokasi" id="tambah_lokasi" required>
                </select>
                <button>Tambahkan</button>
            </div>
        </form>

        <!-- BAGIAN EDIT LOKASI -->
        <form id="PlatMtr" method="post">
            <?php if(isset($_GET['plat']) && $boleh_memasukan_plat): ?>
                <h3>MEMASUKAN MOTOR YANG PARKIR</h3>
                <h3>Plat Nomer: <b><?= $_GET['plat'] ?></b></h3>
                <input type="hidden" name="plat_masuk" value="<?= $_GET['plat'] ?>">
                <br><br><br>
                <div class="radio">
                    <p>Pilih Lantai</p>
                    <input type="radio" id="LT1" name="lantai" value="0" onclick="clickRadioMasuk(0)" checked>
                    <label for="LT1">Lantai 1</label>
                    <input type="radio" id="LT2" name="lantai" value="1" onclick="clickRadioMasuk(1)">
                    <label for="LT2">Lantai 2</label>
                    <input type="radio" id="LT3" name="lantai" value="2" onclick="clickRadioMasuk(2)">
                    <label for="LT3">Lantai 3</label>
                </div>
                <select name="lokasi" id="masuk_lokasi" required>
                </select>
                <button>Masukan</button>
            <?php else: ?>
                <h3>CLICK <b>MASUK</b> UNTUK MEMASUKAN PLAT NOMER KE DALAM PARKIRAN</h3>
            <?php endif; ?>
        </form>
    </div>
    <script>
        var tempat_tersedia = <?= json_encode($tempat_tersedia) ?>;
        console.log(tempat_tersedia);
    </script>
    <script src="script/platnomor.js"></script>