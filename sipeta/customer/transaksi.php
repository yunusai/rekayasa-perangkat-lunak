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
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" href="../assets/logo.png" type="image/png">
</head>

<body>
    <?php
    require_once "../connection/conn.php";
    $id = $_GET['id'];
    $queryShow = "SELECT * FROM pesanan_tiket WHERE id_pwt = $id";
    $queryShow2 = "SELECT * FROM log_transaksi where id_pwt = $id";
    $show = mysqli_query($conn, $queryShow);
    $show2 = mysqli_query($conn, $queryShow2);
    $data = mysqli_fetch_assoc($show);

    $pilihan = array(
        1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16,
        17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30
    );

    $kursi_terpilih = array();
    while ($row = mysqli_fetch_assoc($show2)) {
        $kursi_terpilih[] = intval($row['no_kursi']);
    }
    // Mengecek apakah pilihan terpilih ada dalam daftar pilihan
    foreach ($kursi_terpilih as $terpilih) {
        if (in_array($terpilih, $pilihan)) {
            // Menghapus pilihan terpilih dari daftar pilihan
            $index = array_search($terpilih, $pilihan);
            if ($index !== false) {
                unset($pilihan[$index]);
            }
        }
    }

    if (isset($_POST["submit"])) {
        $id_user = $_SESSION['id'];
        $no_kursi = $_POST['no_kursi'];
        $tanggal = date('Y-m-d H:i:s');
        $id = $_POST['id'];

        $queryUpdate = "INSERT INTO log_transaksi(tgl_transaksi, no_kursi, id_pwt, id_cust)
        VALUES ('$tanggal', '$no_kursi', '$id', '$id_user')";
        $insert = mysqli_query($conn, $queryUpdate);
        $queryShow2 = "SELECT id_transaksi FROM log_transaksi where id_pwt = $id and id_transaksi = (SELECT MAX(id_transaksi) FROM log_transaksi)";
        $show2 = mysqli_query($conn, $queryShow2);
        $data2 = mysqli_fetch_assoc($show2);
        if ($insert) {
            // Redirect ke laman pencetak jika data berhasil disimpan
            header("Location: nota.php?id=$data2[id_transaksi]");
            exit();
        } else {
            // Tampilkan pesan error jika terjadi kesalahan saat menyimpan data
            $error_message = "Error: " . mysqli_error($conn);
        }
    }
    //Sampai sini
    ?>
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
                            <th>Maskapai</th>
                            <th>Rute Perjalanan</th>
                            <th>Tanggal Keberangkatan</th>
                            <th>Jam Keberangkatan</th>
                            <th>Nomor Kursi</th>
                            <th>Harga</th>
                            <th>Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $data["nama_pwt"]; ?></td>
                            <td><?= $data["kota_brkt"]; ?> - <?= $data["tujuan"]; ?></td>
                            <td><?= $data["tgl_brkt"]; ?></td>
                            <td><?= $data["jam_brkt"]; ?></td>
                            <td>
                                <form action="transaksi.php?id=<?= $data["id_pwt"]; ?>" method="post">
                                    <input type="hidden" id="id" name="id" value="<?= $data["id_pwt"]; ?>">
                                    <div class="col-sm-7">
                                        <select class="form-control" name="no_kursi" id="no_kursi">
                                            <option value="null" class="w-50" required>-- Pilih Kursi --</option>
                                            <?php
                                            // Menampilkan pilihan yang tersedia
                                            foreach ($pilihan as $pilihan_item) {
                                                echo '<option value="' . $pilihan_item . '">' . $pilihan_item . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                            </td>
                            <td><?= $data["harga_tiket"]; ?></td>
                            <td>
                                <button type="submit" class="btn btn-info" name="submit">Bayar</button>
                            </td>
                            </form>
                            <?php

                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>


</html>