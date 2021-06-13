<?php

include '../../config/koneksi.php';

$request = 3;

if(isset($_GET['request'])){
	$request = $_GET['request'];
}

if($request == 1){

	$sql = "SELECT * FROM tb_login";
	$employeeData = mysqli_query($koneksi,$sql);

	$response = array();
	
	$no = 1;
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"nomer" => $no++,
			"id_user" => $row['id_user'],
			// "nama" => $row['nama'],
			"username" => $row['username'],
			"password" => $row['password'],
			);
	}

	echo json_encode($response);
	exit;
}

if($request == 2){

	$data = json_decode(file_get_contents("php://input"));

	// $nama = $data->nama;
	$username = $data->username;
	$password = $data->password;
	$level = $data->level;
	
	$password =password_hash($password, PASSWORD_DEFAULT);
	
	$sql = "INSERT INTO tb_login (id_user, username, password, level) VALUES ('','$username','$password','$level')";
	if(mysqli_query($koneksi,$sql)){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}


if ($request == 3) {

	$id_user = $_GET['id_user'];

	$sql = $koneksi->query("DELETE FROM tb_login WHERE id_user = $id_user");

	if($sql){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 4) {

	$id_user = $_GET["id_user"];
	$sql = $koneksi->query("SELECT * FROM tb_login WHERE id_user = '$id_user'");

	$data = array();

	while ($ambil = $sql->fetch_assoc()) {
	    $data[] = array(
	        'id_user' => $ambil['id_user'],
	        // 'nama' => $ambil['nama'],
			'username' => $ambil['username'],
	        'password' => $ambil['password'],
	    );
	}

	echo json_encode($data);
	exit;
}

if ($request == 5) {
	$data = json_decode(file_get_contents("php://input"));

	$id_user = $data->id_user;
	$username = $data->username;

	$sql = $koneksi->query("UPDATE tb_login SET username = '$username' WHERE id_user = $id_user");

	if($sql){
	    echo 1; 
	}else{
	    echo 0;
	}

	exit;
}