<?php
include "../config.php";

// Query untuk setiap view WP
$query1 = "SELECT * FROM jumlahbobot";
$query2 = "SELECT * FROM normalisasiterbobot, kriteria WHERE normalisasiterbobot.idkriteria=kriteria.idkriteria";
$query3 = "SELECT * FROM wp_pangkat";
$query4 = "SELECT * FROM wp_nilaiS";
$query5 = "SELECT * FROM wp_sums";
$query6 = "SELECT * FROM wp_nilaiv";

$result1 = $koneksi->query($query1);
$result2 = $koneksi->query($query2);
$result3 = $koneksi->query($query3);
$result4 = $koneksi->query($query4);
$result5 = $koneksi->query($query5);
$result6 = $koneksi->query($query6);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HASIL WP</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <!-- Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="../index.php">Sistem Informasi</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="pages/resultWP.php">WP</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Data
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../data/dtalternatif.php">Alternatif</a>
                        <a class="dropdown-item" href="../data/dtkriteria.php">Kriteria</a>
                        <a class="dropdown-item" href="../data/dtbobot.php">Bobot</a>
                        <a class="dropdown-item" href="../data/dtmatrix.php">Matriks</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="ml-auto">
            <img src="../images/hacker.png" alt="Avatar" class="rounded-circle" width="40" height="40">
        </div>
    </nav>

    <!-- Kontainer untuk Hasil WP -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">HASIL PERANGKINGAN METODE WP</h2>

        <!-- View 1: Jumlah Bobot -->
        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-light text-center">
                        <strong>Jumlah Bobot</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mx-auto">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = $result1->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['jumlah']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- View 2: Normalisasi WP -->
        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-light text-center">
                        <strong>Normalisasi</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mx-auto">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Hasil Normalisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = $result2->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nmkriteria']; ?></td>
                                        <td><?php echo $row['normalisasi_wp']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- View 3: Pra Nilai S -->
        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-light text-center">
                        <strong>Pra-nilai S</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mx-auto">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alternatif</th>
                                    <th>Value Bobot</th>
                                    <th>Nilai</th>
                                    <th>Pangkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = $result3->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nmalternatif']; ?></td>
                                        <td><?php echo $row['valuebobot']; ?></td>
                                        <td><?php echo $row['nilai']; ?></td>
                                        <td><?php echo $row['pangkat']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

         <!-- View 4: Nilai S -->
        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-light text-center">
                        <strong>Nilai S</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mx-auto">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alternatif</th>
                                    <th>NilaiS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = $result4->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nmalternatif']; ?></td>
                                        <td><?php echo $row['nilaiS']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

         <!-- View 5: Jumlah Nilai S -->
         <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-light text-center">
                        <strong>Sum-nilai S</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mx-auto">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = $result5->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['jum']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- View 5: Jumlah Nilai S -->
        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-light text-center">
                        <strong>Nilai V</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mx-auto">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alternatif</th>
                                    <th>Nilai V</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = $result6->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nmalternatif']; ?></td>
                                        <td><?php echo $row['nilaiV']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html> 