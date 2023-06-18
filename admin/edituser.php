<link rel="stylesheet" href="style/edit_user.css">


<!-- JUDUL -->
<h1>EDIT DATA</h1>

<!-- FORM INPUT DATA -->
<form method="post" class="background">
    <div class="latar">
        <h1>Data Akun User</h1>
        <input name="id" type="hidden" value="<?= $data['id'] ?>">

        <!-- INPUT USERNAME -->
        <div class="form_4">
            <input name="username" class="input_4" placeholder="Username" required type="text" value="<?= $data['username'] ?>">
            <span class="input-border_4"></span>
        </div>

        <!-- INPUT PASSWORD -->
        <div class="form_3">
            <input name="password" class="input_3" placeholder="Password" required type="text" value="<?= $data['password'] ?>">
            <span class="input-border_3"></span>
    </div>

    <!-- TOMBOL SAVE DAN KEMBALI -->
    <div class="tombol_edituser">
        <button type="riset">RESET</button>
        <button type="submit">SAVE</button>
    </div>

</form>