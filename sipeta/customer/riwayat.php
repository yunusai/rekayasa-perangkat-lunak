<?php
require_once "../connection/conn.php";
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan</title>
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
                <table class="table p-3 table-bordered border-primary">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Maskapai</th>
                            <th scope="col">Rute Perjalanan</th>
                            <th scope="col">Waktu Keberangkatan</th>
                            <th scope="col">No Kursi</th>
                            <th scope="col">Tanggal Pemesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $user_id = $_SESSION['id'];

                        $queryShow = "SELECT log_transaksi.*, pesanan_tiket.nama_pwt, pesanan_tiket.kota_brkt, pesanan_tiket.tujuan, pesanan_tiket.tgl_brkt, pesanan_tiket.jam_brkt, pesanan_tiket.harga_tiket
                        FROM log_transaksi
                        INNER JOIN pesanan_tiket ON log_transaksi.id_pwt = pesanan_tiket.id_pwt where log_transaksi.id_cust
                        = '$user_id'"; // menampilkan data
                        $show = mysqli_query($conn, $queryShow);

                        if (mysqli_num_rows($show) > 0) {
                            while ($data = mysqli_fetch_assoc($show)) {

                        ?>
                                <tr class="bg-white">
                                    <td><?= $data["nama_pwt"]; ?></td>
                                    <td><?= $data["kota_brkt"]; ?> - <?= $data["tujuan"]; ?></td>
                                    <td><?= $data["tgl_brkt"]; ?> <?= $data["jam_brkt"]; ?></td>
                                    <td><?= $data["no_kursi"]; ?></td>
                                    <td><?= $data["tgl_transaksi"]; ?></td>

                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr class="bg-white">
                                <td colspan="6" align="center">Belum ada riwayat pemesanan</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
                        }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>