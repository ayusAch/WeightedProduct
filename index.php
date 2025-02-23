<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi SPK</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">Sistem Informasi</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="pages/resultWP.php">WP</a>
                </li>
                <li class="nav-item dropdown">
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Data
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="data/dtalternatif.php"> Alternatif</a>
                        <a class="dropdown-item" href="data/dtkriteria.php"> Kriteria</a>
                        <a class="dropdown-item" href="data/dtbobot.php"> Bobot</a>
                        <a class="dropdown-item" href="data/dtmatrix.php"> Matriks</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="ml-auto">
            <img src="images/hacker.png" alt="Avatar" class="rounded-circle" width="40" height="40">
        </div>
    </nav>
    <!-- Tabel Data Riset -->
    <div class="container">
        <h2 class="text-center">Hasil Perankingan</h2>
        <br>
        <!-- Tampilkan Data Perangkingan -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama Alternatif</th>
                        <th>Nilai</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "config.php";

                    $no = 1;
                    $query = "SELECT * FROM perankingan ORDER BY ranking ASC";
                    $result = $koneksi->query($query);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nmalternatif']; ?></td>
                                <td><?php echo $row['nilaiV']; ?></td>
                                <td><?php echo $row['ranking']; ?></td>
                            </tr>
                        <?php }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Data tidak ditemukan</td></tr>";
                    }

                    $koneksi->close();
                    ?>
                </tbody>
            </table>
        </div>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>