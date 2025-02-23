function editData(id) {
    // Logika untuk edit data
    alert("Edit data dengan ID: " + id);
    // Misalnya, Anda bisa mengarahkan ke halaman edit
    // window.location.href = 'edit.php?id=' + id;
}

function hapusData(id) {
    // Konfirmasi sebelum menghapus
    if (confirm("Anda yakin ingin menghapus data ini?")) {
        // Logika untuk hapus data
        alert("Hapus data dengan ID: " + id);
        // Misalnya, panggil API atau redirect
        // window.location.href = 'hapus.php?id=' + id;
    }
}
