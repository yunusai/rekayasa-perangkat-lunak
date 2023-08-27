<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
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
            <div class="col-md-12 text-center">
                <h1>Daftar User</h1> <br>
                <form role="search" method="POST" action="datauser.php">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="search">
                </form>
            </div>
        </div>
    </div>
    <!-- Table -->
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table p-3 table-bordered border-primary">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
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
                            $delete = mysqli_query($conn, "DELETE FROM user WHERE id_cust = $id");
                            $delete = mysqli_query($conn, "DELETE FROM log_transaksi WHERE id_cust = $id");
                        }
                        if (isset($_POST['search'])) {
                            $kata_kunci = $_POST['search'];

                            $query = "SELECT * FROM user WHERE id_cust LIKE '%$kata_kunci%' OR username 
                            LIKE '%$kata_kunci%'";
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
                                    <td><?= $data["id_cust"]; ?></td>
                                    <td><?= $data["username"]; ?></td>
                                    <td class="action">
                                        <a href="datauser.php?id=<?php echo $data["id_cust"] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php

                            }
                        } else {
                            //         if (isset($_POST["submit"])) {
                            //             $id_cust = $_POST["id_cust"];
                            //             $username = $_POST["username"];
                            //             $pass = $_POST["pass"];

                            //             $queryCreated = "INSERT INTO user(id_cust, username, pass,) 
                            // VALUES ('$id_cust', '$username', '$pass',)";

                            //             $created = mysqli_query($conn, $queryCreated);
                            //         }


                            $queryShow = "SELECT * FROM user  WHERE role = 'customer' ORDER BY id_cust ASC"; // menampilkan data
                            $show = mysqli_query($conn, $queryShow);

                            if (mysqli_num_rows($show) > 0) {
                                while ($data = mysqli_fetch_assoc($show)) {

                                ?>
                                    <tr class="bg-white">
                                        <td><?= $data["id_cust"]; ?></td>
                                        <td><?= $data["username"]; ?></td>
                                        <td class="action">
                                            <a href="datauser.php?id=<?php echo $data['id_cust'] ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr class="bg-white">
                                    <td colspan="4" align="center">Belum ada user</td>
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
    <!-- End Table -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>