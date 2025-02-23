<!DOCTYPE html>
<html>

<head>
    <title>Form Bobot</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container shadow p-4 rounded bg-white">
        <div class="form-header">
            <h3 class="text-primary">Form Bobot</h3>
            <a href="../data/dtbobot.php" class="btn btn-outline-secondary btn-sm">Lihat Data Bobot</a>
        </div>

        <form action="../aksi/aksiBobot.php" method="POST">
            <div class="form-group">
                <label for="kriteria">Nama Kriteria</label>
                <select name="kriteria" id="kriteria" class="form-control">
                    <?php
                    include "../config.php";
                    $query = "SELECT * FROM kriteria";
                    $result = mysqli_query($koneksi, $query);
                    while ($c = mysqli_fetch_array($result)) { 
                        echo "<option value='" . $c['idkriteria'] . "'>" . $c['nmkriteria'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="value">Value Bobot</label>
                <input type="number" name="value" id="value" class="form-control" placeholder="Masukkan Value Bobot" required>
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
