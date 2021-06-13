<?php

include "../config/koneksi.php";

$sql = $con_object->query("SELECT * FROM kategori");

$data = array();

while ($ambil = $sql->fetch_assoc()) {
    $data[] = array(
        'id_kategori' => $ambil['id_kategori'],
        'kategori' => $ambil['kategori']
    );
}

echo json_encode($data);
exit;