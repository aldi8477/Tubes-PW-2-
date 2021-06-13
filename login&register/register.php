<?php
    $con = new mysqli("localhost", "root", "", "shoes-store");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form method="POST">
            <label>Username</label><br>
            <input type="text" name="username"><br>
            <label>password</label><br>
            <input type="password" name="password"><br>
            <label>confirmasi password</label><br>
            <input type="password" name="confirm_password"><br>
            <button type="submit" name="btn-register">Register</button>
            <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
        </form>
    </div>
    </body>
</html>
    <?php
    if (isset($_POST['btn-register'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password']; 

        $result = $con ->query("SELECT username FROM tb_login WHERE username = '$username'");
        
        if (mysqli_fetch_assoc($result) > 0){
            echo "<script>alert('username sudah terdaftar');</script>";
            echo "<script>window.location.replace('register.php');</script>";
        }
        if($password != $confirm_password){
            echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
            echo "<script>window.location.replace('register.php');</script>";
        }

            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = $con->query("INSERT INTO tb_login VALUES ('','$username', '$password' ,3)");

        if ($query != 0){
            echo "<script>alert('berhasil')</script>";
            echo "<script>window.location.replace('login.php');</script>";
        } else{
            echo "<script>alert('gagal')</script>";
            echo "<script>window.location.replace('register.php');</script>";
        }
    }
    ?>