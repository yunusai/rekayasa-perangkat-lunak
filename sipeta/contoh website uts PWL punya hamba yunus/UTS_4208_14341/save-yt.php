<?php
// memulai session
session_start();

// cek apakah pengguna telah login
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muhammad Yunus Saifullah">
    <meta name="content" content="saveyourlink, save link, save your link, save, your, link, table, search">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="shortcut icon" href="asset/logo.png" type="image/png" />
    <link rel="stylesheet" href="style/style.css" />
    <title>Youtube Play - SaveYourLink</title>
</head>

<body>

    <!--HEADER
    -->
    <header class="p-2 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center ml-3">
                <a href="index.php" class="d-flex text-decoration-none">
                    <img src="asset/logo.png" alt="Logo" width="40" height="40" class="bi me-0 d-inline-block align-text-top">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-3 text-white">Beranda</a></li>
                    <li><a href="save-link.php" class="nav-link px-3 text-white">Save Link</a></li>
                    <li><a href="save-yt.php" class="nav-link px-3 text-white">Youtube Play</a></li>
                    <li><a href="about.php" class="nav-link px-3 text-white">Tentang</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-0" role="search" method="POST" action="search.php">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search" name="search">
                </form>


                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                ?>
                    <div class="text-end" style="margin-left: 15px;">
                        <a href="logout.php"><button type="button" class="btn btn-outline-light me-2">Logout</button></a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="text-end" style="margin-left: 15px;">
                        <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </header>

    <!--
    END HEADER
  -->

    <!--Tampilkan video-->
    <?php
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    ?>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    include "conn.php";
                    // Mengambil data video dari database
                    $user_id = $_SESSION['id'];
                    $sql = "SELECT * FROM link_yt WHERE user_id = $user_id order by id ASC";
                    $result = mysqli_query($conn, $sql);
                    $number = 1;

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $data = mysqli_fetch_assoc($result);
                        $id_list = $data["id_list"];
                        $delete = mysqli_query($conn, "DELETE FROM link_yt WHERE id = $id");
                        $delete2 = mysqli_query($conn, "DELETE FROM link_list WHERE id = $id_list");
                    }

                    // Menampilkan video YouTube
                    if (mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                            $note = $data["note"];
                            $link = $data["link"];
                            $short_link = substr($link, 0, 43) . "";
                            $embed_link = str_replace("/watch?v=", "/embed/", $short_link);
                    ?>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <iframe class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" <?php echo 'src="' . $embed_link .
                                                                                                                                                                                            '"' ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <div class="card-body">
                                        <p class="card-text"><?= $note; ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="edit2.php?id=<?php echo $data["id"] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                                <a href="save-yt.php?id=<?php echo $data["id"] ?>"><button type="button" id="delete" class="btn btn-sm btn-outline-secondary">Delete</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php
                            $number++;
                        }
                    } else {
                        ?>

                        <div align="center" class="mx-auto text-white">
                            Kamu belum memasukkan video sama sekali
                            <a type="button" class="btn btn-primary" href="save-link.php">Save Link</a>
                        </div>

                    <?php
                    }

                    if (mysqli_num_rows($result) > 0) {
                    ?>

                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Tambah link pada <a type="button" class="btn btn-primary" href="save-link.php">Save Link</a></p>
                                </div>
                            </div>
                        </div>


                    <?php
                    }

                    ?>


                </div>
            </div>
        </div>
        <!--Akhir Tampilkan Video-->


    <?php
    } else {
    ?>
        <h2 align="center" style="color: white;">Silahkan <a type="button" class="btn btn-primary" href="login.php">login</a> untuk menggunakan fitur</h2>
        <?php
    }

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        if ($number > 4) {
        ?>
            <footer align="center" class="m-3" style="color:white;">
                Copyright &copy; Yunus 2023
            </footer>
        <?php
        } else {
        ?>
            <footer align="center" class="fixed-bottom" style="color:white;">
                Copyright &copy; Yunus 2023
            </footer>
        <?php
        }
    } else {
        ?>
        <footer align="center" class="fixed-bottom" style="color:white;">
            Copyright &copy; Yunus 2023
        </footer>
    <?php
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">

    </script>
</body>

</html>