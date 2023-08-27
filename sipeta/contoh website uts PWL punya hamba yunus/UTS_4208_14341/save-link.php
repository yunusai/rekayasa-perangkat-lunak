<?php
session_start();

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
    <title>Save Link - SaveYourLink</title>
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

    <?php
    include "conn.php";

    if (isset($_POST["submit"])) {
        $note = $_POST["note"];
        $link = $_POST["link"];
        $user_id = $_SESSION['id'];

        $queryCreated = "INSERT INTO link_list(user_id, note, link) VALUES ('$user_id', '$note', '$link')";

        $created = mysqli_query($conn, $queryCreated);
    }

    if (isset($_POST["submit2"])) {
        $note = $_POST["note"];
        $link = $_POST["link"];
        $user_id = $_SESSION['id'];

        $query2 = "INSERT INTO link_list(user_id, note, link) VALUES ('$user_id', '$note', '$link')";

        $create2 = mysqli_query($conn, $query2);

        $id_list = mysqli_insert_id($conn);

        $queryCreated = "INSERT INTO link_yt(user_id, id_list, note, link) VALUES ('$user_id', '$id_list', '$note', '$link')";

        $created = mysqli_query($conn, $queryCreated);
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete = mysqli_query($conn, "DELETE FROM link_list WHERE id = $id");
    }

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    ?>
        <!-- Form Data -->
        <div class="container card mt-5 col-md-8">
            <div class="card-header fw-bold">Save your link by register it in this form</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class=" mb-3">
                        <label for="task" class="form-label">Catatan/Nama</label>
                        <input type="text" class="form-control" id="note" name="note" required>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link*</label>
                        <input type="text" class="form-control" id="link" name="link" required>
                    </div>

                    <div class="d-flex justify-content-center">
                        -> Untuk disimpan pada tabel saja =
                        <button type="submit" name="submit" class="btn btn-primary mx-auto">Save to List</button>
                        -> Untuk disimpan pada tabel dan Youtube Play =
                        <button type="submit" name="submit2" class="btn btn-danger mx-auto">Youtube Saver</button>
                    </div>

                    <div class="mt-2 fw-1">
                        *Untuk fungsi youtube saver tolong masukkan alamat lengkap(beserta https:// nya)
                    </div>

                    Untuk melihat hasil youtube silahkan pindah ke halaman <a type="button" class="btn btn-primary btn-sm" href="save-yt.php">Youtube Play</a>.
                </form>
            </div>
        </div>
        <!-- End Form Data -->

        <!-- Table -->
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
                    $user_id = $_SESSION['id'];
                    $queryShow = "SELECT * FROM link_list WHERE user_id = $user_id ORDER BY id ASC"; // menampilkan data
                    $show = mysqli_query($conn, $queryShow);
                    $number = 1;

                    if (mysqli_num_rows($show) > 0) {
                        while ($data = mysqli_fetch_assoc($show)) {

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
                            $number++;
                        }
                    } else {
                        ?>
                        <tr class="bg-white">
                            <td colspan="4" align="center">No Data Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- End Table -->
    <?php
    } else {
    ?>
        <h2 align="center" style="color: white;">Silahkan <a type="button" class="btn btn-primary" href="login.php">login</a> untuk menggunakan fitur</h2>

        <?php
    }

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        if ($number >= 4) {
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