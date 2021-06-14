<?php

include "koneksi.php";
$id = $_GET["id"];
$sql = $koneksi->query("DELETE FROM tokosepatu WHERE id = '$id'");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;