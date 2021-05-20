<?php 
session_start();
if (!isset($_SESSION['login'])){
    
    echo "<script>alert('logout dahulu');</script>";
    echo "<script>window.location.replace('login.php');</script>";
    }
session_destroy();

echo "<script>alert('berhasil logout');</script>";
echo "<script>window.location.replace('login.php');</script>";
?>