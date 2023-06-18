// Deklarasi variabel
const tambah_lokasi = document.getElementById("tambah_lokasi");
const masuk_lokasi = document.getElementById("masuk_lokasi");

// Assigment function
function clickRadioTambah(lantai) {
    tambah_lokasi.innerHTML = "<option value='' selected disabled>Pilih Lokasi..</option>";
    for (let i = 0; i < tempat_tersedia[lantai].length; i++) {
        let area = tempat_tersedia[lantai][i];
        tambah_lokasi.innerHTML += "<option value='"+ area +"'>Area "+ (area+1) +"</option>";
    }
}
function clickRadioMasuk(lantai) {
    masuk_lokasi.innerHTML = "<option value='' selected disabled>Pilih Lokasi..</option>";
    for (let i = 0; i < tempat_tersedia[lantai].length; i++) {
        let area = tempat_tersedia[lantai][i];
        masuk_lokasi.innerHTML += "<option value='"+ area +"'>Area "+ (area+1) +"</option>";
    }
}
function hapus_plat(plat_nomor, lantai, lokasi) {
    console.log(plat_nomor);
    if (window.confirm("Hapus plat "+ plat_nomor +" ?")) {
        window.location.href = "?page=platnomor&plat_hapus="+ plat_nomor +"&lantai="+ lantai +"&lokasi="+ lokasi;
    }
}

// Jalankan fungsi
clickRadioTambah(0);
clickRadioMasuk(0);