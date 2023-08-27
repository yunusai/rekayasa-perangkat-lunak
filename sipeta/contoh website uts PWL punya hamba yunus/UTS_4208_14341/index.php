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
  <meta name="content" content="start, home, first page, saveyourlink, save link, save your link, save, your, link">
  <link rel="stylesheet" href="style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="shortcut icon" href="asset/logo.png" type="image/png" />
  <title>Home - SaveYourLink</title>


</head>

<body>

  <!--
    HEADER
  -->
  <header class="p-2 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-center">
        <a href="index.php" class="d-flex text-decoration-none">
          <img src="asset/logo.png" alt="Logo" width="40" height="40" class="bi me-0 d-inline-block align-text-top">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-0 justify-content-center mb-md-0">
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

  <main class="awalan text-center pb-5" style="color:white;">
    <form role="search" method="POST" action="search.php">
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
      ?>
        <h2>Selamat Datang <?= $_SESSION['username'] ?> di SaveYourLink.</h2>
      <?php
      } else {
      ?>
        <h2>Selamat Datang di SaveYourLink</h2>
        <br>
        <h2>Silahkan <a type="button" class="btn btn-primary" href="login.php">login</a> untuk menggunakan fitur</h2>
      <?php
      }

      ?>

      <br>
      <br>
      Situs penyimpanan link yang akan memudahkan hidup Anda dengan cara yang sederhana. Pindah ke <a type="button" class="btn btn-primary" href="save-link.php">Save Link</a> .
      Lalu simpan link mu dengan mengisi form yang ditampilkan. Isikan Catatan/Nama untuk menandai link mu agar bisa dicari dengan mudah melalui fitur
      <input type="search" class="form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search" name="search" style="max-width: 300px;"> .
      Dan isikan alamat link yang ingin disimpan pada form. <br> <img src="asset/isi-form-biasa.png" width="50%" height="50%" alt="">
      <br> Inputan tersebut akan ditampilkan pada tabel <br> <img src="asset/tampil-tabel-biasa.png" width="50%" height="50%" alt="">
      <br> Link dapat juga disimpan menggunakan Youtube Saver. <br> <img src="asset/isi-form-yt.png" width="50%" height="50%" alt="">
      <br> link tersebut akan disimpan pada tabel seperti Save to List <br> <img src="asset/tampil-tabel-yt.png" width="50%" height="50%" alt="">
      <br> Tapi yang istimewa dari Youtube Saver adalah link akan ditampilkan menjadi playlist video kecil di <a type="button" class="btn btn-primary" href="save-yt.php">Youtube Play</a>
      <br> <img src="asset/tampil-yt.png" width="50%" height="50%" alt="">
    </form>


  </main>

  <footer align="center" class="fixed-bottom" style="color:white;">
    Copyright &copy; Yunus 2023
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
</body>

</html>