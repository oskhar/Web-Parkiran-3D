<link rel="stylesheet" href="style/akunuser.css">
<div class="latar">
    <div class="background">
        <h1>DATA USER</h1>
        <div class="flex">
            <div class="kotak1">
                <h3>USERNAME</h3>
                <p><?= $data_user['username'] ?></p>
                <h3>PASSWORD</h3>
                <p><?= $data_user['password'] ?></p>
                <button onclick="window.location.href='bundle.php?page=edituser&id=<?= $data_user['id'] ?>';">Edit</button>
            </div>
            <div class="kotak2">
                <h3>Plat Nomor</h3>
                <ol>
                    <?php while ($data_plat = mysqli_fetch_assoc($result_plat)): ?>
                    <li>
                        <?= $data_plat['nomor'] ?> <?= $list_status[$data_plat['status']] ?><br>
                        <button onclick="window.location.href='index.php?lt=<?= $data_plat['lantai'] ?>&loc=<?= $data_plat['lokasi'] ?>'">Lihat</button>
                    </li>
                    <?php endwhile; ?>
                </ol>
            </div>
        </div>
    </div>
</div>