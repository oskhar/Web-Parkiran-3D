function hapus_admin(id, nama) {
    if (window.confirm("Hapus akun "+ nama +"?")) {
        window.location.href = "?page=akunadmin&hapus_id="+ id;
    }
}