<?php
session_start();
require "config.php";

//proses dari login admin
if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $pass = md5($_POST["pass"]);

    $sql = "SELECT * FROM tbuser where username='$username' AND pass ='$pass'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {

        $_SESSION['username'] = $row["username"];
        $_SESSION['role'] = $row["role"];
        $_SESSION['status'] = "y";

        header("Location:index.php");
    } else {
        header("Location:?msg=n");
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <!-- style boostraps -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- style tambahan -->
    <link rel="stylesheet" href="styles/utama.css">
</head>

<body>

    <!-- bagian banner -->
    <div class="banner"></div>
    <!-- bagian banner akhir -->

    <!-- bagian navbar -->
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="#" class="navbar-brand">Exper<span style="color: red;">System</span></a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="utama.php" class="nav-link active">Home</a></li>
            <li class="nav-item"><a href="?page=kerja" class="nav-link active">AlurKerja</a></li>
            <li class="nav-item"><a href="?page=cek" class="nav-link active">Cek Kerusakan</a></li>
            <li class="nav-item"><a href="#login" class="nav-link active">Admin</a></li>
            <div class="aoverlay" id="login">
                <!-- validasi login gagal -->
                <?php
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "n") {
                ?>
                        <div class="alert alert-danger" align="center" style="position: relative; z-index: 10;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Login Gagal</strong>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- validasi login gagal berakhir -->
                <div class="acontainer">
                    <div class="abox aform-box">
                        <header>Hallo Admin!</header>
                        <form action="" method="post">
                            <div class="afield input">
                                <label for="username" style="font-weight: bold; text-align: left;">Username</label>
                                <input type="text" name="username" id="username" required autocomplete="off" autofocus>
                            </div>
                            <div class="afield input">
                                <label for="password" style="font-weight: bold; text-align: left;">Password</label>
                                <input type="password" name="pass" id="password" required>
                            </div>
                            <div class="afield">
                                <input type="submit" class="abtn" name="submit" value="Login" required>
                                <a class="btn btn-danger mt-2" href="utama.php">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </ul>
    </div>
    <!-- bagian navbar berakhir -->

    <!-- bagian container -->
    <div class="container mt-2 mb-2">
        <!-- bagian setting menu -->
        <?php

        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page == "") {
            include "home.php";
        } elseif ($page == "cek") {
            if ($action == "") {
                include "utampil_cek_kerusakan.php";
            } else {
                include "uhasil_cek.php";
            }
        } else {
            include "alurkerja.php";
        }
        ?>
        <!-- bagian setting menu end -->
    </div>
    <!-- bagian container berakhir -->



    <!-- instalasi jquer -->
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <!-- link boostraps js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- link popper -->
    <script src="assets/js/popper.min.js"></script>
    <!-- datatables js -->
    <script src="assets/js/datatables.min.js"></script>
</body>

</html>