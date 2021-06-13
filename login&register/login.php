<?php
session_start();
if (isset($_SESSION['login'])){
    echo "<script>alert('logout dahulu');</script>";
    echo "<script>window.location.replace('index.php');</script>";
}
$con = new mysqli("localhost", "root", "", "shoes-store");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: url("1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        * {
  margin: 0;
  padding: 0;
  outline: 0;
  font-family: "open sans", sans-serif;
}
p {
  color: black;
  font-family: "open sans", sans-serif;
  padding-top: 10px;
}
h1 {
  text-align: center;
  padding-left: 100px;
  padding-bottom: 20px;
}
a {
  color: gold;
  font-family: "open sans", sans-serif;
}
.container {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  padding: 20px 25px;
  width: 400px;
  background-color: 0, 0, 0, 0.7;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}
.container h1 {
  text-align: left;
  color: black;
  margin-bottom: 30px;
  text-transform: uppercase;
  border-bottom: 4px solid blue;
}
.container label {
  text-align: left;
  color: black;
}
.container form input {
  width: 100%;
  height: 40px;
  padding: 5px 0;
  border: none;
  background-color: blue;
  font-size: 18px;
  color: #fafafa;
  border-radius: 20px;
  text-align: center;
}

    </style>
</head>
<body>
    <div class="container" style="background-color:white;">
        <h1>Login</h1>
        <form method="POST">
            <label>Username</label><br>
            <input type="text" name="username"><br>
            <label>Password</label><br>
            <input type="password" name="password"><br>
            <button type="submit" name="btn-login">Login</button>
            <p>belum punya akun? <a href="register.php">register disini</a></p>
        </form>
    </div>
    </body>
</html>
<?php
    if (isset($_POST["btn-login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $con->query("SELECT * from tb_login where username = '$username' ");
    
        if (mysqli_num_rows($result) === 1) {

            $data = mysqli_fetch_assoc($result);

            if (password_verify($password, $data['password'])) {

              if ($data['role_id']==1) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $data['username'];
                echo "<script>alert('Berhasil Login');</script>";
                echo "<script>window.location.replace('../dashboard1');</script>";
              } else{$_SESSION['login'] = true;
                $_SESSION['username'] = $data['username'];
                echo "<script>alert('Berhasil Login');</script>";
                echo "<script>window.location.replace('../index.php');</script>";

              }

            $_SESSION['login'] = true;
            $_SESSION['username'] = $data['username'];
            echo "<script>alert('Berhasil Login');</script>";
            echo "<script>window.location.replace('../index.php');</script>";

            }else{
            echo "<script>alert('Gagal Login');</script>";
            echo "<script>window.location.replace('login.php');</script>";            
            }


             } else {
            echo "<script>alert('Gagal Login')</script>";
            echo "<script>window.location.replace('login.php');</script>";
        }
    }
?>