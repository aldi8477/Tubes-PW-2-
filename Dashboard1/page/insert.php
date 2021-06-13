<?php

include "../config/koneksi.php";

$data = json_decode(file_get_contents("php://input"));

$nama = $data->nama;

$sql = $con_object->query("INSERT INTO kategori VALUES ('', '$nama')");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;