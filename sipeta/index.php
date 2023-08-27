<?php
session_start();
ob_start();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muhammad Yunus Saifullah">
    <meta name="content" content="start, home, first page, saveyourlink, save link, save your link, save, your, link">

    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="assets/logo.png" type="image/png">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />




    <!-- Custom styles for this template -->
</head>

<body class="text-center bg-dark">




    <main class="form-signin w-100 m-auto">
        <div class="container bg-dark w-50 h-100 top-50" style="margin-top: 250px; border:1px solid black;">
            <form class="mb-2" method="post">
                <img class="mb-4" src="assets/logo.png" alt="" width="72" height="57">

                <div class="form-floating">
                    <input type="username" class="form-control w-20" id="floatingInput" name="username" placeholder="Username" require>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control w-20" id="floatingPassword" name="pass" placeholder="Password" require>
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="w-40 btn btn-lg btn-primary" name="submit" type="submit">Login</button>
            </form>
            <span class="text-white fw-normal">
                Belum daftar?
            </span>
            <a href="sign-up.php"><button class="w-40 btn btn-sm btn-info">Sign up</button></a>
        </div>
    </main>

    <?php
    include "connection/conn.php";
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        // query untuk mencari data user berdasarkan username dan password
        $sql = "SELECT * FROM user WHERE username = '$username' AND pass = '$pass'";

        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $role =  $data['role'];

        // cek apakah data user ditemukan
        if (mysqli_num_rows($result) > 0) {
            $tgl_login = date("Y-m-d H:i:s");

            // Menyimpan data login ke dalam tabel log_login
            $insertQuery = "INSERT INTO log_registrasi (id_cust, tgl_login) VALUES ('" . $data['id_cust'] . "', '" . $tgl_login . "')";
            mysqli_query($conn, $insertQuery);
            if ($role == "customer") {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $data['username'];
                $_SESSION['id'] = $data['id_cust'];


                header("Location:customer/home.php");
            } else {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $data['username'];
                $_SESSION['id'] = $data['id_cust'];


                header("Location:admin/daftartiket.php");
            }
        } else {
    ?>
            <script>
                alert("Username atau Password salah");
            </script>
    <?php
        }
    }
    ?>

</body>

</html>