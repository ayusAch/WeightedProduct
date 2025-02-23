<?php
    include "../config.php";
    $kriteria = $_POST['kriteria'];
    $value = $_POST['value'];
    $sql="INSERT INTO bobot (idkriteria, value) VALUES ('".$kriteria."','".$value."')";
    $a=$koneksi->query($sql);
    if ($a === true) {
        header('Location: ../data/dtBobot.php');
    } else {
        echo "Gagal Insert Data";
    }
    ?>