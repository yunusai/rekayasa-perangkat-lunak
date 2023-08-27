<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" href="../assets/logo.png" type="image/png">
</head>

<body>
    <div class="container-fluid bg-primary" style="width: 100%;">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="../assets/logo.png" alt="Logo" width="80" height="60" class="bi me-0 d-inline-block align-text-top">

            </a>

            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="home.php" class="nav-link text-light">Home</a>
                </li>
                <li class="nav-item">
                    <a href="pesan.php" class="nav-link text-light">Pesan Tiket</a>
                </li>
                <li class="nav-item">
                    <a href="riwayat.php" class="nav-link text-light">Riwayat Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php" class="btn btn-danger">Logout</a>
                </li>
            </ul>
        </header>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <form role="search" method="POST" action="pesan.php">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="search">
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table p-3 table-bordered border-primary">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Maskapai</th>
                            <th scope="col">Rute Perjalanan</th>
                            <th scope="col">Waktu Keberangkatan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once "../connection/conn.php";
                        // $user_id = $_SESSION['id'];
                        // $queryShow = "SELECT * FROM pesanan_tiket WHERE user_id = $user_id ORDER BY id ASC"; // menampilkan data

                        if (isset($_POST['search'])) {
                            $kata_kunci = $_POST['search'];

                            $query = "SELECT * FROM pesanan_tiket WHERE nama_pwt LIKE '%$kata_kunci%' OR kota_brkt 
                            LIKE '%$kata_kunci%' OR tujuan LIKE '%$kata_kunci%'";
                            $queryCreated = mysqli_query($conn, $query);
                            $hasil = array();
                            $number = 0;
                            while ($data = mysqli_fetch_assoc($queryCreated)) {
                                array_push($hasil, $data);
                                $number++;
                            }
                            foreach ($hasil as $data) {
                        ?>
                                <tr class="bg-white">
                                    <td><?= $data["nama_pwt"]; ?></td>
                                    <td><?= $data["kota_brkt"]; ?> - <?= $data["tujuan"]; ?></td>
                                    <td><?= $data["tgl_brkt"]; ?> <?= $data["jam_brkt"]; ?></td>
                                    <td><?= $data["harga_tiket"]; ?></td>
                                    <td class="action">
                                        <a href="transaksi.php?id=<?php echo $data["id_pwt"] ?>" class="btn btn-primary">Pesan</a>
                                    </td>
                                </tr>
                                <?php

                            }
                        } else {
                            $queryShow = "SELECT * FROM pesanan_tiket ORDER BY id_pwt ASC"; // menampilkan data
                            $show = mysqli_query($conn, $queryShow);
                            if (mysqli_num_rows($show) > 0) {
                                while ($data = mysqli_fetch_assoc($show)) {

                                ?>
                                    <tr class="bg-white">
                                        <td><?= $data["nama_pwt"]; ?></td>
                                        <td><?= $data["kota_brkt"]; ?> - <?= $data["tujuan"]; ?></td>
                                        <td><?= $data["tgl_brkt"]; ?> <?= $data["jam_brkt"]; ?></td>
                                        <td><?= $data["harga_tiket"]; ?></td>
                                        <td class="action">
                                            <a href="transaksi.php?id=<?php echo $data["id_pwt"] ?>" class="btn btn-primary">Pesan</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr class="bg-white">
                                    <td colspan="4" align="center">Tidak ada maskapai</td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>