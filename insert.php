<?php

include "koneksi.php";

$data = json_decode(file_get_contents("php://input"));

$nama = $data->nama;
$merk_sepatu = $data->merk_sepatu;
$size_sepatu = $data->size_sepatu;

$sql = $koneksi->query("INSERT INTO tokosepatu (nama, merk_sepatu, size_sepatu) VALUES ('$nama', '$merk_sepatu', '$size_sepatu')");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;