<?php include 'config/koneksi.php'; ?>
<html>
    <head>
        <title>CRUD BASIS DATA</title>
    </head>
    <body>
        <a href="?halaman=dashboard">Dashboard</a> | 
        <a href="?halaman=kategori"> Kategori </a> |
        <a href="?halaman=kategori-prosedur"> Kategori Prosedur</a> |
        <a href="?halaman=kategori-pdo"> Kategori PDO </a>
        
        <hr>

        <?php 
            if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == "dashboard") {
                    include 'page/dashboard.php';
                } else if ($_GET['halaman'] == "tambah-kategori") {
                    include 'page/tambah-kategori.php';
                } else if ($_GET['halaman'] == "kategori") {
                    include 'page/kategori.php';
                } else if ($_GET['halaman'] == "edit-kategori") {
                    include 'page/edit-kategori.php';
                } else if ($_GET['halaman'] == "kategori-prosedur") {
                    include 'page/kategori-prosedur.php';
                } else if ($_GET['halaman'] == "tambah-kategori-prosedur") {
                    include 'page/tambah-kategori-prosedur.php';
                } else if ($_GET['halaman'] == "edit-kategori-procedur") {
                    include 'page/edit-kategori-prosedur.php';
                } else if ($_GET['halaman'] == "kategori-pdo") {
                    include 'page/kategori-pdo.php';
                } else if ($_GET['halaman'] == "tambah-kategori-pdo") {
                    include 'page/tambah-kategori-pdo.php';
                } else if ($_GET['halaman'] == "edit-pdo") {
                    include 'page/edit-kategori-pdo.php';
                }
            } else {
                include "page/dashboard.php";
            }
        ?>
    </body>
</html>