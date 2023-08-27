<?php
require_once "../connection/conn.php";
// Start the session
session_start();
$name = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <h1 align="center">
        Welcome to SiPeta, <?php echo $_SESSION['username']; ?></h1>

    <div id="portfolio" class="portfolio p-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-uppercase text-center fw-bold fs-4 p-5">
                        <p><u>Destinasi</u></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mt-4 shadow">
                        <img src="../assets/jakarta-monas.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="portfolio-title" style="padding-bottom: 5%;">Jakarta</h5>
                            <a href="pesan.php" class="btn btn-primary">Beli Tiket</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mt-4 shadow">
                        <img class="img" src="../assets/download.jpeg" alt="...">
                        <div class="card-body">
                            <h5 class="portfolio-title" style="padding-bottom: 5%;">Semarang</h5>
                            <a href="pesan.php" class="btn btn-primary">Beli Tiket</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mt-4 shadow">
                        <img class="img-responsive img-col-event" src="../assets/surabaya.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="portfolio-title" style="padding-bottom: 5%;">GEBYAR SEMARAK TAHUN BARU 2023</h5>
                            <a href="pesan.php" class="btn btn-primary">Beli Tiket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>