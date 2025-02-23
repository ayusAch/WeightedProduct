<?php
include "../config.php";

$aksi = isset($_POST['aksi']) ? $_POST['aksi'] : (isset($_GET['aksi']) ? $_GET['aksi'] : '');
$id = isset($_POST['id']) ? intval($_POST['id']) : (isset($_GET['id']) ? intval($_GET['id']) : 0);
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$atribut = isset($_POST['atribut']) ? $_POST['atribut'] : '';

if (empty($aksi)) {
    echo "Parameter aksi tidak ditemukan";
    exit;
}

if ($aksi == 'insert') {
    $sql = "INSERT INTO kriteria (nmkriteria, atribut) VALUES ('$nama', '$atribut')";
    if ($koneksi->query($sql)) {
        header('Location: ../data/dtkriteria.php');
    } else {
        echo "Gagal Insert Data: " . $koneksi->error;
    }
} else if ($aksi == 'update') {
    if ($id > 0) {
        $sql = "UPDATE kriteria SET nmkriteria = '$nama', atribut = '$atribut' WHERE idkriteria = $id";

        if ($koneksi->query($sql)) {
            header('Location: ../data/dtkriteria.php');
        } else {
            echo "Gagal Update Data: " . $koneksi->error;
        }
    }
} else if ($aksi == 'delete') {
    if ($id > 0) {
        $sql = "DELETE FROM kriteria WHERE idkriteria = $id";
        if ($koneksi->query($sql)) {
            header('Location: ../data/dtkriteria.php');
        } else {
            echo "Gagal Delete Data: " . $koneksi->error;
        }
    }
} else {
    echo "Aksi tidak valid: $aksi";
}
?>