<?php
include "../config.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nama_kriteria = '';
$atribut = '';

if ($id > 0) {
    $query = "SELECT * FROM kriteria WHERE idkriteria = $id";
    $result = $koneksi->query($query);

    if ($result && $row = $result->fetch_array()) {
        $nama_kriteria = $row['nmkriteria'];
        $atribut = $row['atribut'];
    }
}
?>

<head>
    <title>Form Kriteria</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>


<div class="container shadow p-4 rounded bg-white">
    <div class="form-header">
        <h3 class="text-primary">Form Kriteria</h3>
        <a href="../data/dtkriteria.php" class="btn btn-outline-secondary btn-sm">Lihat Data Kriteria</a>
    </div>

    <form action="../aksi/aksiKriter.php" method="POST">
        <input type="hidden" name="aksi" value="<?php echo $id > 0 ? 'update' : 'insert'; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="form-group">
            <label for="nama">Nama Kriteria</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Kriteria"
                value="<?php echo $nama_kriteria; ?>" required>
        </div>

        <div class="form-group">
            <label for="atribut">Atribut</label>
            <select name="atribut" id="atribut" class="form-control" required>
                <option value="" disabled selected>Pilih Atribut</option>
                <option value="Cost" <?php echo $atribut == 'Cost' ? 'selected' : ''; ?>>Cost</option>
                <option value="Benefit" <?php echo $atribut == 'Benefit' ? 'selected' : ''; ?>>Benefit</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-custom">Save</button>
            <a href="../index.php" class="btn btn-danger btn-custom">Back</a>
        </div>
    </form>
</div>