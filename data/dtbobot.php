<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Bobot</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h3 class="text-center mb-4">Data Bobot</h3>

        <!-- Tombol Insert Data -->
        <div class="d-flex justify-content-end mb-3">
            <a href="../form/form_bobot.php" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a href="../index.php" class="btn btn-success btn-sm">Home</a>
        </div>

        <!-- Tabel Data Bobot -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama Kriteria</th>
                        <th>Value Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../config.php";
                    $no = 1;
                    $query = "SELECT * FROM bobot JOIN kriteria ON bobot.idkriteria = kriteria.idkriteria";
                    $result = $koneksi->query($query);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nmkriteria']; ?></td>
                                <td><?php echo $row['valuebobot']; ?></td>                            
                            </tr>
                        <?php }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>Data tidak ditemukan</td></tr>";
                    }
                    $koneksi->close();
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
