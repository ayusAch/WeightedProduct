<?php
include "../config.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kriteria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center mb-4">Data Kriteria</h3>

                <!-- Tombol Insert Data -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="../form/form_kriteria.php" class="btn btn-primary">Tambah Kriteria</a>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="../index.php" class="btn btn-success">Home</a>
                </div>

                <!-- Tabel Data Kriteria -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Nama Kriteria</th>
                                <th>Atribut</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT * FROM kriteria";
                            $result = $koneksi->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nmkriteria']; ?></td>
                                        <td><?php echo $row['atribut']; ?></td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="../form/form_kriteria.php?id=<?php echo $row['idkriteria']; ?>" class="btn btn-warning btn-sm mt-2">Edit</a>

                                            <!-- Tombol Delete -->
                                            <a href="../aksi/aksiKriter.php?aksi=delete&id=<?php echo $row['idkriteria']; ?>"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                                class="btn btn-danger btn-sm mt-1">Delete</a>
                                        </td>
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
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '../aksi/aksiKriteria.php';

                var inputAksi = document.createElement('input');
                inputAksi.type = 'hidden';
                inputAksi.name = 'aksi';
                inputAksi.value = 'delete';
                form.appendChild(inputAksi);

                var inputId = document.createElement('input');
                inputId.type = 'hidden';
                inputId.name = 'id';
                inputId.value = id;
                form.appendChild(inputId);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

</body>

</html>