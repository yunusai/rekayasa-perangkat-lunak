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
    <title>Nota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" href="../assets/logo.png" type="image/png">
    <style>
        .center-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        @media print {
            .center-button {
                display: none;
            }

            .ticket {
                background-color: blue;
                border: 1px solid black;
            }
        }
    </style>
</head>

<body>
    <?php
    $id = $_GET["id"];

    $query = "SELECT log_transaksi.*, pesanan_tiket.nama_pwt, pesanan_tiket.kota_brkt, pesanan_tiket.tujuan, pesanan_tiket.tgl_brkt, pesanan_tiket.jam_brkt, pesanan_tiket.harga_tiket
FROM log_transaksi
INNER JOIN pesanan_tiket ON log_transaksi.id_pwt = pesanan_tiket.id_pwt where log_transaksi.id_transaksi = $id";

    // $query = "SELECT * FROM log_transaksi WHERE id_pwt = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    // if (isset($_POST["submit"])) {
    //     $id = $_POST["id"];
    //     $no_kursi = $_POST["no_kursi"];

    //     // Retrieve the saved data from the database based on the given ID and no_kursi
    //     $data = mysqli_fetch_assoc($result);
    // }
    ?>

    <div class="container">
        <h1>Nota & Detail</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Maskapai</th>
                    <th>Rute Perjalanan</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Jam Keberangkatan</th>
                    <th>Nomor Kursi</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $data["nama_pwt"] ?? "No Data"; ?></td>
                    <td><?= $data["kota_brkt"] ?? "No Data"; ?> - <?= $data["tujuan"] ?? "No Data"; ?></td>
                    <td><?= $data["tgl_brkt"] ?? "No Data"; ?></td>
                    <td><?= $data["jam_brkt"] ?? "No Data"; ?></td>
                    <td><?= $data["no_kursi"]  ?? "No Data"; ?></td>
                    <td><?= $data["harga_tiket"] ?? "No Data"; ?></td>
                </tr>
            </tbody>
        </table>
        <!-- <div class="center-button">
            <button onclick="printPage()" class="btn btn-primary">Print</button>
        </div> -->
    </div>
    <div class="container ticket">
        <h1>E-ticket</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Maskapai</th>
                    <th>Rute Perjalanan</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Jam Keberangkatan</th>
                    <th>Nomor Kursi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $data["nama_pwt"] ?? "No Data"; ?></td>
                    <td><?= $data["kota_brkt"] ?? "No Data"; ?> - <?= $data["tujuan"] ?? "No Data"; ?></td>
                    <td><?= $data["tgl_brkt"] ?? "No Data"; ?></td>
                    <td><?= $data["jam_brkt"] ?? "No Data"; ?></td>
                    <td><?= $data["no_kursi"] ?? "No Data"; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="center-button">
            <button onclick="printPage()" class="btn btn-primary">Print</button>
        </div>
        <div class="center-button">
            <a href="home.php" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <script>
        function printPage() {
            window.print();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>