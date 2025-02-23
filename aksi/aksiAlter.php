<?php
include "../config.php";

$aksi = isset($_POST['aksi']) ? $_POST['aksi'] : '';
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($aksi == 'insert') {
    $nama = $_POST['nama'];
    $sql = "INSERT INTO alternatif (nmalternatif) VALUES ('" . $nama . "')";
    $a = $koneksi->query($sql);

    if ($a === true) {
        header('Location: ../data/dtalternatif.php');
    } else {
        echo "Gagal Insert Data";
    }
} elseif ($aksi == 'edit') {
    $nama = $_POST['nama'];
    if ($id > 0) {
        $sql = "UPDATE alternatif SET nmalternatif = '" . $nama . "' WHERE idalternatif = $id";
        $a = $koneksi->query($sql);

        if ($a === true) {
            header('Location: ../data/dtalternatif.php');
        } else {
            echo "Gagal Mengupdate Data";
        }
    } else {
        echo "ID tidak ditemukan";
    }
} elseif ($aksi == 'delete') {
    $ids = isset($_POST['id']) ? $_POST['id'] : [];

    if (!empty($ids)) {
        try {
            // Mulai transaction untuk menjaga integritas database
            $koneksi->begin_transaction();

            foreach ($ids as $id) {
                // Menghapus data dari tabel matrix yang berhubungan foreign key
                $delete_matrix = $koneksi->query("DELETE FROM matrix WHERE idalternatif = $id");
                if (!$delete_matrix) {
                    throw new Exception("Gagal menghapus data matrix untuk id $id");
                }

                // Menghapus data dari tabel alternatif
                $delete_alternatif = $koneksi->query("DELETE FROM alternatif WHERE idalternatif = $id");
                if (!$delete_alternatif) {
                    throw new Exception("Gagal menghapus data alternatif untuk id $id");
                }
            }

            $koneksi->commit();
            header('Location: ../data/dtalternatif.php');

        } catch (Exception $e) {
            $koneksi->rollback();
            echo "Gagal Menghapus Data: " . $e->getMessage();
        }
    } else {
        echo "Tidak ada data yang dipilih untuk delete";
    }
}
?>