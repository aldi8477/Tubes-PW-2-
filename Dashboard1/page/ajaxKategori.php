<?php

include "../config/koneksi.php";

$data = json_decode(file_get_contents("php://input"));

$kategori = $data->kategori;

$sql = $con_object->query("INSERT INTO kategori VALUES ('', '$kategori')");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;