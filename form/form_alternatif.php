<?php
include "../config.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$namaAlternatif = '';

if ($id > 0) {
    $query = "SELECT * FROM alternatif WHERE idalternatif = $id";
    $result = $koneksi->query($query);

    if ($result && $row = $result->fetch_array()) {
        $namaAlternatif = $row['nmalternatif'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Alternatif</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container shadow p-4 rounded bg-white">
        <div class="form-header">
            <h3 class="text-primary">Form Alternatif</h3>
            <a href='../data/dtalternatif.php' class="btn btn-outline-secondary btn-sm">Lihat Data Alternatif</a>
        </div>

        <form action="../aksi/aksiAlter.php" method="POST">
            <?php if ($id > 0): ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="aksi" value="edit">
            <?php else: ?>
                <input type="hidden" name="aksi" value="insert">
            <?php endif; ?>

            <div class="form-group">
                <label for="nama">Nama Alternatif</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Alternatif" required value="<?php echo $namaAlternatif; ?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-custom">Save</button>
                <a href="../index.php" class="btn btn-danger btn-custom">Back</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
