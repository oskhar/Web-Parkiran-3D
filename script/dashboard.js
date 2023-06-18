function hapus_user(id, nama) {
    if (window.confirm("Hapus akun "+ nama +"?")) {
        window.location.href = "?page=dashboard&id_hapus="+ id;
    }
}