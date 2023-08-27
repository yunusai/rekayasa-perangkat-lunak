<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tiket</title>
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

    <div class="container w-75">
        <div class="row">
            <div class="col">
                <form action="daftartiket.php" method="post">
                    Maskapai: <input class="form-control" type="text" name="nama_pwt" id="nama_pwt" required><br>
                    Kota Berangkat: <input class="form-control" type="text" name="kota_brkt" id="kota_brkt" required><br>
                    Tujuan: <input class="form-control" type="text" name="tujuan" id="tujuan" required><br>
                    Tanggal Berangkat: <input class="form-control" type="date" name="tgl_brkt" id="tgl_brkt" required><br>
                    Jam Berangkat: <input class="form-control" type="time" name="jam_brkt" id="jam_brkt" required><br>
                    Harga: <input class="form-control" type="number" name="harga_tiket" id="harga_tiket" required><br>
                    <button class="form-control btn btn-info" type="submit" name="submit" id="submit">Buat</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>