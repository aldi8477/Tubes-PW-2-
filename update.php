<?php

include "koneksi.php";

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$nama = $data->nama;
$merk_sepatu = $data->merk_sepatu;
$size_sepatu = $data->size_sepatu;

$sql = $koneksi->query("UPDATE tokosepatu SET nama = '$nama', merk_sepatu = '$merk_sepatu', size_sepatu = '$size_sepatu' WHERE id = $id");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;