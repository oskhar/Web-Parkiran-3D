<link rel="stylesheet" href="style/edit_user.css">

<!-- JUDUL -->
<form method="post" class="background">
    <div class="latar">
        <h1>DATA AKUN USER</h1>

        <!-- INPUT USERNAME -->
        <div class="form_4">
            <input class="input_4" placeholder="Username" required type="text" value="<?= $_GET['username'] ?>">
            <span class="input-border_4"></span>
        </div>

        <!-- INPUT PASSWORD -->
        <div class="form_3">
            <input class="input_3" placeholder="Password" required type="text" value="<?= $_GET['password'] ?>">
            <span class="input-border_3"></span>
    </div>

    <!-- TOMBOL SAVE DAN KEMBALI -->
    <div class="tombol_edituser">
        <button type="riset">RESET</button>
        <button type="submit">SAVE</button>
    </div>

</form>