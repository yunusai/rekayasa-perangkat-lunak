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
    <meta name="content" content="about, tentang, author, info, detail, saveyourlink, save link, save your link, save, your, link">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="shortcut icon" href="asset/logo.png" type="image/png" />
    <title>Tentang - SaveYourLink</title>


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
        <h2>Tentang Web SaveYourLink</h2>
        <p>SaveYourLink adalah website penyimpan link yang dapat menyimpan segala link dan juga memiliki fitur penampil
            video youtube dengan fitur Youtube Saver yang dapat dengan mudah digunakan siapa saja. Website ini memiliki
            fungsi dan fasilitas untuk menyimpan link dan ditampilkan pada sebuah tabel di
            <a type="button" class="btn btn-primary" href="save-link.php">Save Link</a>. Link yang dimasukkan pengunjung
            akan tersimpan pada databse sehingga pengunjung dapat selalu mengakses/melihat link tersebut melewati website
            ini. Pengguna juga dapat menghapus atau mengupdate data yang sudah dimasukkan pada tabel. Link dapat diberi
            sebuah catatan atau nama untuk dijadikan penginat sebagai pengguna atau dipakai sebagai acuan untuk mencari link.
            Link dapat disimpan dengan 2 cara, yaitu Save to List dan Youtube Saver. Save to List memiliki fungsi untuk menyimpan
            link hanya pada tabel di <a type="button" class="btn btn-primary" href="save-link.php">Save Link</a>. jikalau
            Youtube Saver menyimpan pada tabel dan juga menampilkan video youtube pada <a type="button" class="btn btn-primary" href="save-yt.php">Youtube Play</a>.

        </p>
        <br>
        <br>
        <br>
        <h2>Tentang Pembuat</h2>
        <br>
        <img src="asset/Foto-profil.jpg" alt="Foto Diri" width="20%" height="10%">
        <div>
            <i>"Saya diselamatkan dari kematian untuk menemukan jalan hidup saya yang sebenarnya"</i>
        </div>
        <article style="text-align: center;">
            <h2>Overview</h2>
            <p>
                Selamat datang di Website saya SaveYourLink, Saya adalah author dari website ini. Nama lengkap
                saya adalah Muhammad Yunus Saifullah. Biasa dipanggil Yunus. Saya sedang menempuh pendidikan
                di Universitas Dian Nuswantoro.
            </p>
        </article>
        <div style="max-width: 600px; margin: 3em auto">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Skill</th>
                        <th>Pengalaman</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <ul>
                                <li>Expert in Excel</li>
                                <li>Above Average Analytical Thinking</li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li>Mendapatkan lisensi Excel resmi dari Microsoft</li>
                                <li>Membuat Website SaveYourLink</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            Kontak
        </div>
        <a href="https://www.instagram.com/potarikko/"><img src="asset/logo-ig.png" alt="Instagram" width="5%" height="5%"></a>
    </main>

    <footer align="center" class="fixed-bottom" style="color:white;">
        Copyright &copy; Yunus 2023
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>