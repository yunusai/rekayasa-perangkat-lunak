<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
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
                    <a href="daftartiket.php" class="nav-link text-light">Daftar Tiket</a>
                </li>
                <li class="nav-item">
                    <a href="laporan_transaksi.php" class="nav-link text-light">Laporan Transaksi</a>
                </li>
                <li class="nav-item">
                    <a href="datauser.php" class="nav-link text-light">Data User</a>
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
                <form role="search" method="POST" action="laporan_transaksi.php">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="search">
                </form>
                <br>
                <table class="table p-3 table-bordered border-primary">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID Transaksi</th>
                            <th scope="col">ID User</th>
                            <th scope="col">ID Pesawat</th>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once "../connection/conn.php";
                        // $user_id = $_SESSION['id'];
                        // $queryShow = "SELECT * FROM pesanan_tiket WHERE user_id = $user_id ORDER BY id ASC"; // menampilkan data
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $delete = mysqli_query($conn, "DELETE FROM log_transaksi WHERE id_transaksi = $id");
                        }

                        if (isset($_POST['search'])) {
                            $kata_kunci = $_POST['search'];

                            $query = "SELECT log_transaksi.*, pesanan_tiket.nama_pwt, pesanan_tiket.kota_brkt, pesanan_tiket.tujuan, pesanan_tiket.tgl_brkt, pesanan_tiket.jam_brkt, pesanan_tiket.harga_tiket
                            FROM log_transaksi
                            INNER JOIN pesanan_tiket ON log_transaksi.id_pwt = pesanan_tiket.id_pwt WHERE pesanan_tiket.id_pwt LIKE '%$kata_kunci%' OR log_transaksi.tgl_transaksi LIKE '%$kata_kunci%'";
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
                                    <td><?= $data["id_transaksi"]; ?></td>
                                    <td><?= $data["id_cust"]; ?></td>
                                    <td><?= $data["id_pwt"]; ?></td>
                                    <td><?= $data["tgl_transaksi"]; ?></td>
                                    <td><?= $data["harga_tiket"]; ?></td>
                                    <td class="action">
                                        <a href="laporan_transaksi.php?id=<?php echo $data['id_pwt'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php

                            }
                        } else {
                            $queryShow = "SELECT log_transaksi.*, pesanan_tiket.nama_pwt, pesanan_tiket.kota_brkt, pesanan_tiket.tujuan, pesanan_tiket.tgl_brkt, pesanan_tiket.jam_brkt, pesanan_tiket.harga_tiket
                        FROM log_transaksi
                        INNER JOIN pesanan_tiket ON log_transaksi.id_pwt = pesanan_tiket.id_pwt"; // menampilkan data
                            $show = mysqli_query($conn, $queryShow);
                            $total = 0;

                            if (mysqli_num_rows($show) > 0) {
                                while ($data = mysqli_fetch_assoc($show)) {

                                ?>
                                    <tr class="bg-white">
                                        <td><?= $data["id_transaksi"]; ?></td>
                                        <td><?= $data["id_cust"]; ?></td>
                                        <td><?= $data["id_pwt"]; ?></td>
                                        <td><?= $data["tgl_transaksi"]; ?></td>
                                        <td><?= $data["harga_tiket"]; ?></td>
                                        <td class="action">
                                            <a href="laporan_transaksi.php?id=<?php echo $data['id_transaksi'] ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    $total = $total + $data["harga_tiket"];
                                }
                            } else {
                                ?>
                                <tr class="bg-white">
                                    <td colspan="6" align="center">Tidak ada pemesanan</td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="3" align="center">
                                </td>
                                <td> <?php echo "Total Pemasukan: " . $total; ?></td>
                                <td colspan="2"></td>
                            </tr>
                        <?php
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