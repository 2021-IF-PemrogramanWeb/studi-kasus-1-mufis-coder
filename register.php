<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = $_POST["phone"];


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password, phone) 
            VALUES (:name, :username, :email, :password, :phone)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email,
        ":phone" => $phone
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="register_login.css">
</head>
<body>
    <div class="registration-form">
        <form action="" method="POST">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control item" name="name" id="name" placeholder="Your Name">
            </div>
            <div class="form-group">
            <label for="name">User Name</label>
                <input type="text" class="form-control item" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" class="form-control item" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" class="form-control item" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="name">Nomor Telfon</label>
                <input type="text" class="form-control item" name="phone" id="phone-number" placeholder="Phone Number">
            </div>
            <!-- <div class="form-group">
                <input type="text" class="form-control item" id="birth-date" placeholder="Birth Date">
            </div> -->
            <div class="form-group">
                <!-- <button type="button" class="btn btn-block create-account">Create Account</button> -->
                <input type="submit" class="btn btn-block create-account" name="register" value="Daftar" />
            </div>
            <div class="register-login">
                <p>Have an account? <a href="login.php">Sign In</a></p>
            </div>
        </form>
        <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="register_login.js"></script>
</body>
</html>
