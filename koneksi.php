<?php
$koneksi = new mysqli ("localhost", "root", "", "db_tokosepatu");

if (!$koneksi) {
    die("Connection Failed");
}