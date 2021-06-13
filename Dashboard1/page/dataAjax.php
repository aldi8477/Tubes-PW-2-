<?php

include "../config/koneksi.php";

$sql = $con_object->query("SELECT * FROM kategori");

$data = array();

while ($ambil = $sql->fetch_assoc()) {
    $data[] = array(
        'id_ketegori' => $ambil['id_ketegori'],
        'nama_kategori' => $ambil['nama_kategori']
    );
}

echo json_encode($data);
exit;