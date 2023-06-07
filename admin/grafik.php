<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login User</title>
    <link rel="stylesheet" href="style/styleDas_2.css">
</head>
<body>

    <!-- BAGIAN 4 KOTAK -->
    <div class="kotak">
        <div class="kotak_1"></div>
        <div class="kotak_2"></div>
        <div class="kotak_3"></div>
        <div class="kotak_4"></div>
    </div>

    <!-- BAGIAN GRAFIK -->
    <div class="grafik"></div>

    <!-- BAGIAN JUDUL DAN SEACRH -->
    <div class="display">
        <div><h1>PENJELASAN GRAFIK</h1></div>
        <form class="form">
            <label for="search">
                <input class="input" type="text" required="" placeholder="Search" id="search">
                <div class="fancy-bg"></div>
                <div class="search">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="r-14j79pv r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-4wgw6l r-f727ji r-bnwqim r-1plcrui r-lrvibr">
                        <g>
                            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                        </g>
                    </svg>
                </div>
                <button class="close-btn" type="reset">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </label>
        </form>
    </div>

    <!-- BAGIAN TABEL -->
    <!-- BAGIAN TABEL -->
    <div id="konten">
        <table class="table" style="border: 2px solid  #202122;">
            <tr>
                <td>ID</td>
                <td>USERNAME</td>
                <td>PASSWORD</td>
                <td colspan="2">AKSI</td>
                <td>STATUS</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Faiz Haidar Halwi</td>
                <td>Desain Grafis</td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">hapus</a></td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">edit</a></td>
                <td>AKTIF</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Vallendra Dwi</td>
                <td>Agri Bisnis</td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">hapus</a></td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">edit</a></td>
                <td>AKTIF</td>
            </tr>
            <tr>
                <td>3</td>
                <td>M Fajar Ganevi</td>
                <td>Teknik Informasi</td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">hapus</a></td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">edit</a></td>
                <td>MATI</td>
            </tr>
            <tr>
                <td>4</td>
                <td>M Daffa Malik</td>
                <td>Teknik Sipil</td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">hapus</a></td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">edit</a></td>
                <td>AKTIF</td>
            </tr>
            <tr>
                <td>5</td>
                <td>M Aidil Ryansyah</td>
                <td>Pendidikan</td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">hapus</a></td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">edit</a></td>
                <td>MATI</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Tanjung Aswendo</td>
                <td>Kedokteran</td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">hapus</a></td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">edit</a></td>
                <td>MATI</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Fathir Ridho</td>
                <td>Hukum</td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">hapus</a></td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">edit</a></td>
                <td>MATI</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Seka Abdul Matin</td>
                <td>Tarbiyyah</td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">hapus</a></td>
                <td><a href="http://" style="color: #fff; text-decoration: none;">edit</a></td>
                <td>MATI</td>
            </tr>
        </table>

        <!-- BAGIAN PAGINATION -->
        <div id="pagination">
            <button><</button>
            <button>1</button>
            <button>2</button>
            <button>3</button>
            <button>></button>
        </div>

</body>
</html>