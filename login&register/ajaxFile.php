<?php
    session_start();
    include "../../config/koneksi.php";

    $data = json_decode(file_get_contents("php://input"));

    $username = $data->username;
    $password = $data->password;

    $sql = $con_object->query("SELECT username FROM admin WHERE username = '$username' ");

    if (mysqli_num_rows($sql) === 1) {
        $data = mysqli_fetch_assoc($sql);

        $array = mysqli_fetch_assoc($sql);

        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];

        echo 1;
    } else {

        echo 0;
        
    }

exit;