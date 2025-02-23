<!DOCTYPE html>
<html>

<head>
    <title>Form Matrix Keputusan</title>
    <!-- Link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Link ke CSS Kustom -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container shadow p-4 rounded bg-white">
        <div class="form-header mb-4">
            <h3 class="text-primary">Form Matrix Keputusan</h3>
            <a href="../data/dtmatrix.php" class="btn btn-outline-secondary btn-sm">Lihat Data Matrix Keputusan</a>
        </div>

        <form action="../aksi/aksiMatrix.php" method="POST">
            <!-- Alternatif Selection -->
            <div class="form-group">
                <label for="alternatif">Nama Alternatif</label>
                <select name="alternatif" id="alternatif" class="form-control" required>
                    <?php
                    include "../config.php";
                    $query = "SELECT * FROM alternatif";
                    $result = mysqli_query($koneksi, $query);
                    while ($c = mysqli_fetch_array($result)) {
                        echo "<option value='" . $c['idalternatif'] . "'>" . $c['nmalternatif'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Kriteria Selection -->
            <div class="form-group">
                <label for="kriteria">Penilaian Kriteria</label>
                <?php
                include "../config.php";
                $query = "SELECT * FROM kriteria";
                $result = mysqli_query($koneksi, $query);

                while ($c = mysqli_fetch_array($result)) {
                    // Menampilkan nama kriteria dengan input nilai
                    echo '<div class="mb-3">';
                    echo '<label for="kriteria' . $c['idkriteria'] . '" class="form-label">' . $c['nmkriteria'] . '</label>';
                    echo '<input type="hidden" name="kriteria[]" value="' . $c['idkriteria'] . '">';
                    echo '<input type="number" class="form-control" id="kriteria' . $c['idkriteria'] . '" name="nilai[]" placeholder="Masukkan nilai untuk ' . $c['nmkriteria'] . '" required>';
                    echo '</div>';
                }
                ?>
            </div>

            <!-- Submit & Reset Buttons -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-custom">Save</button>
                <a href="../index.php" class="btn btn-danger btn-custom">Back</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS & jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>