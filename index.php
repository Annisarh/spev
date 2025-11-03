<?php
session_start();
//koneksi database
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar EV</title>

    <style>
        .item a::after {
            content: '';
            display: block;
            border-bottom: 0.1rem solid red;
            transform: scaleX(0);
            transition: 0.2s linear;
        }

        .item a:hover::after {
            transform: scaleX(1);
        }

        .navbar-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: black;
            text-decoration: underline;
            position: relative;
            left: -200px;
            top: 2px;
        }

        .navbar-logo span {
            color: red;
        }
    </style>

    <!-- instalasi boostrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- data table css -->
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- chosen css -->
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
</head>

<body>
    <!-- navbar stars -->
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark justify-content-end">
        <label class="navbar-logo disabled" style="position: relative; left: -500px;">Expert <span>System</span></label>
        <ul class="navbar-nav" style="font-size: 18px; font-weight: bold;">
            <li class="nav-item active item">
                <a class="nav-link" href="index.php">Home</a>
            </li>

            <!-- setting hak akses -->
            <?php if ($_SESSION['role'] == "Admin") {
            ?>
                <li class="nav-item active item">
                    <a class="nav-link" href="?page=users">Users</a>
                </li>
                <li class="nav-item active item">
                    <a class="nav-link" href="?page=gejala">Gejala</a>
                </li>
                <li class="nav-item active item">
                    <a class="nav-link" href="?page=kerusakan">Kerusakan</a>
                </li>
                <li class="nav-item active item">
                    <a class="nav-link" href="?page=aturan">Basis Aturan</a>
                </li>
                <li class="nav-item active item">
                    <a class="nav-link" href="?page=cekadm">Cek Kerusakan</a>
                </li>
            <?php
            } else { ?>
                <li class="nav-item active item">
                    <a class="nav-link" href="?page=cek">Cek Kerusakan</a>
                </li>
            <?php
            }
            ?>

            <li class="nav-item active item">
                <a class="nav-link" href="?page=logout">Logout</a>
            </li>
        </ul>
    </nav>
    <!-- navbar ends -->

    <!-- cek status login -->
    <?php
    if ($_SESSION['status'] != "y") {
        header("Location:utama.php");
    }
    ?>

    <!-- container stars -->
    <div class="container mt-2 mb-2">

        <!-- setting menu start -->
        <?php

        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page == "") {
            include "welcome.php";
        } elseif ($page == "gejala") {
            if ($action == "") {
                include "tampil_gejala.php";
            } elseif ($action == "tambah") {
                include "tambah_gejala.php";
            } elseif ($action == "update") {
                include "update_gejala.php";
            } else {
                include "hapus_gejala.php";
            }
        } elseif ($page == "kerusakan") {
            if ($action == "") {
                include "tampil_kerusakan.php";
            } elseif ($action == "tambah") {
                include "tambah_kerusakan.php";
            } elseif ($action == "update") {
                include "update_kerusakan.php";
            } else {
                include "hapus_kerusakan.php";
            }
        } elseif ($page == "aturan") {
            if ($action == "") {
                include "tampil_aturan.php";
            } elseif ($action == "tambah") {
                include "tambah_aturan.php";
            } elseif ($action == "detail") {
                include "detail_aturan.php";
            } elseif ($action == "update") {
                include "update_aturan.php";
            } elseif ($action == "hapus_gejala") {
                include "hapus_detail_aturan.php";
            } else {
                include "hapus_aturan.php";
            }
        } elseif ($page == "cek") {
            if ($action == "") {
                include "tampil_cek_kerusakan.php";
            } else {
                include "hasil_cek.php";
            }
        } elseif ($page == "cekadm") {
            if ($action == "") {
                include "tampil_cek_kerusakan_adm.php";
            } else {
                include "detail_cek_kerusakan_adm.php";
            }
        } elseif ($page == "users") {
            if ($action == "") {
                include "tampil_users.php";
            } elseif ($action == "tambah") {
                include "tambah_users.php";
            } elseif ($action == "update") {
                include "update_users.php";
            } else {
                include "hapus_users.php";
            }
        } else {
            include "logout.php";
        }
        ?>

        <!-- settingan menu ends -->

    </div>
    <!-- container ends -->



    <!-- instalasi jquery -->
    <script src="assets/js/jquery-3.7.0.min.js"></script>

    <!-- instalasi bootsrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- datatables js -->
    <script src="assets/js/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <!-- font awesome js -->
    <script src="assets/js/all.js"></script>

    <!-- chosed select js -->
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script>
        $(function() {
            $('.chosen').chosen();
        });
    </script>
</body>

</html>