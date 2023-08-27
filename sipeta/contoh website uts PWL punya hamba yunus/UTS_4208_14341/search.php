<?php
// memulai session
session_start();

// cek apakah pengguna telah login
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Muhammad Yunus Saifullah">
        <meta name="content" content="start, home, first page, saveyourlink, save link, save your link, save, your, link">
        <link rel="stylesheet" href="style/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <link rel="shortcut icon" href="asset/logo.png" type="image/png" />
        <title>Hasil cari - SaveYourLink</title>
    </head>

    <body>
        <!--
    HEADER
  -->
        <header class="p-2 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="home.php" class="d-flex text-decoration-none">
                        <img src="asset/logo.png" alt="Logo" width="40" height="40" class="bi me-0 d-inline-block align-text-top">
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-0 justify-content-center mb-md-0">
                        <li><a href="home.php" class="nav-link px-3 text-white">Beranda</a></li>
                        <li><a href="save-link.php" class="nav-link px-3 text-white">Save Link</a></li>
                        <li><a href="save-yt.php" class="nav-link px-3 text-white">Youtube Play</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-0" role="search" method="POST" action="search.php">
                        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search" name="search">
                    </form>


                    <div class="text-end" style="margin-left: 15px;">
                        <a href="logout.php"><button type="button" class="btn btn-outline-light me-2">Logout</button></a>
                    </div>

                </div>
            </div>
        </header>

        <!--
    END HEADER
  -->

        <div class="container mt-5 col-md-8">
            <table class="table p-3">
                <thead class="bg-dark text-white text-decoration-none">
                    <tr>
                        <th scope="col">Catatan/Nama</th>
                        <th scope="col">Link</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "conn.php";
                    if (isset($_POST['search'])) {
                        $kata_kunci = $_POST['search'];
                        $user_id = $_SESSION['id'];

                        $query = "SELECT * FROM link_list WHERE note  LIKE '%$kata_kunci%'  AND user_id = $user_id";
                        $queryCreated = mysqli_query($conn, $query);
                        $hasil = array();
                        $number = 0;
                        while ($data = mysqli_fetch_assoc($queryCreated)) {
                            array_push($hasil, $data);
                            $number++;
                        }
                        if ($number >= 1) {
                            foreach ($hasil as $data) {
                    ?>
                                <tr class="bg-white">
                                    <td><?= $data["note"]; ?></td>
                                    <td><?= $data["link"]; ?></td>
                                    <td class="action">
                                        <a href="edit.php?id=<?php echo $data["id"] ?>" class="btn btn-primary">Edit</a>
                                        <a href="save-link.php?id=<?php echo $data["id"] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php

                            }
                        } else { ?>
                            <tr align="center" class="bg-white">
                                <td colspan="4">Tidak ditemukan</td>
                            </tr>
                    <?php
                        }
                    }


                    ?>
                </tbody>


                <footer align="center" class="fixed-bottom" style="color:white;">
                    Copyright &copy; Yunus 2023
                </footer>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
                </script>
    </body>

    </html>
<?php
} else {
    // redirect ke halaman login jika pengguna belum login
    header("Location: index.php");
    exit();
}
?>