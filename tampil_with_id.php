<?php

include "koneksi.php";
$id = $_GET["id"];
$sql = $koneksi->query("SELECT * FROM tokosepatu WHERE id = '$id'");

$data = array();

while ($ambil = $sql->fetch_assoc()) {
    $data[] = array(
        'id' => $ambil['id'],
        'nama' => $ambil['nama'],
        'merk_sepatu' => $ambil['merk_sepatu'],
        'size_sepatu' => $ambil['size_sepatu']
    );
}

echo json_encode($data);
exit;