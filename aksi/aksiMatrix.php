<?php
include "../config.php";
// Mengambil data dari form
$alternatif = $_POST['alternatif']; // ID alternatif
$kriteria = $_POST['kriteria']; // Array ID kriteria
$nilai = $_POST['nilai']; // Array nilai kriteria

// Memulai proses insert
try {
    // Loop untuk setiap pasangan kriteria dan nilai
    for ($i = 0; $i < count($kriteria); $i++) {
        $sql = "INSERT INTO matrix (idalternatif, idkriteria, nilai) 
                VALUES ('{$alternatif}', '{$kriteria[$i]}', '{$nilai[$i]}')";
        $result = $koneksi->query($sql); // Menggunakan koneksi dari config.php

        // Cek jika query gagal
        if (!$result) {
            throw new Exception("Gagal menyimpan data kriteria ID: {$kriteria[$i]}");
        }
    }

    // Redirect jika semua berhasil
    header('Location: ../data/dtmatrix.php');
} catch (Exception $e) {
    // Menampilkan pesan error jika ada
    echo "Gagal Insert Data: " . $e->getMessage();
}
?>
