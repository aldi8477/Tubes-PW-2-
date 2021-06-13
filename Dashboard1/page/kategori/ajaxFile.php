<?php

include '../../config/koneksi.php';

$request = 3;

if(isset($_GET['request'])){
	$request = $_GET['request'];
}

if($request == 1){

	$sql = "SELECT * FROM kategori";
	$employeeData = mysqli_query($koneksi,$sql);

	$response = array();
	
	$no = 1;
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"nomer" => $no++,
			"id_kategori" => $row['id_kategori'],
			"nama_kategori" => $row['nama_kategori'],
			);
	}

	echo json_encode($response);
	exit;
}


if($request == 2){

	$data = json_decode(file_get_contents("php://input"));

	$nama_kategori = $data->nama_kategori;
	
	$sql = "INSERT INTO kategori VALUES ('','$nama_kategori')";
	if(mysqli_query($koneksi,$sql)){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 3) {

	$id_kategori = $_GET['id_kategori'];

	$sql = $koneksi->query("DELETE FROM kategori WHERE id_kategori = $id_kategori");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}

if ($request == 4) {

	$id_kategori = $_GET["id_kategori"];
	$sql = $koneksi->query("SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");

	$data = array();

	while ($ambil = $sql->fetch_assoc()) {
	    $data[] = array(
	        'id_kategori' => $ambil['id_kategori'],
	        'nama_kategori' => $ambil['nama_kategori']
	    );
	}

	echo json_encode($data);
	exit;
}

if ($request == 5) {
	$data = json_decode(file_get_contents("php://input"));

	$id_kategori = $data->id_kategori;
	$nama_kategori = $data->nama_kategori;
	

	$sql = $koneksi->query("UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = $id_kategori");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}