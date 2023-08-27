<?php
include "conn.php";
$sql = mysqli_query($conn, "Select * from link_yt where id='$_GET[id]'");
$data = mysqli_fetch_array($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="asset/logo.png">
    <link rel="stylesheet" href="style/style.css">
    <title>Edit Link - SaveYourLink</title>
</head>

<body>
    <!--HEADER
    -->
    <header class="p-2 bg-dark">
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
    <!-- Form Data -->
    <div class="container card mt-5 col-md-8">
        <div class="card-header fw-bold">Update your link by register it in this form</div>
        <div class="card-body">
            <form action="" method="post">
                <div class=" mb-3">
                    <label for="task" class="form-label">Catatan/Nama</label>
                    <input type="text" class="form-control" id="note" name="note" value="<?php echo $data['note']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?php echo $data['link']; ?>" required>
                </div>

                <button type="submit" value="Update" name="proses" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <!-- End Form Data -->

    <footer align="center" class="fixed-bottom" style="color:white;">
        Copyright &copy; Yunus 2023
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
<?php

if (isset($_POST['proses'])) {

    mysqli_query($conn, "update link_yt set
    note = '$_POST[note]',
    link = '$_POST[link]' where id='$_GET[id]'") or die(mysqli_error($conn));

    mysqli_query($conn, "update link_list set
    note = '$_POST[note]',
    link = '$_POST[link]' where id='$data[id_list]'") or die(mysqli_error($conn));

    echo "<script>document.location='save-yt.php'</script>";
}

?>