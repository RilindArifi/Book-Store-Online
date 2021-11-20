<?php
require_once '../config.php';
require_once 'header.php';



 $username = $password = "";
 $username_err = $password_err = $error = "";

 if (isset($_POST['submit'])) {
     if (empty($_POST['username'])) {
         $username_err = "Please enter your email";
     } else {
         $username = test_input($_POST['username']);
     }


     if (empty($_POST['password'])) {
         $password_err = "Please enter your password";
     } else {
         $password = test_input($_POST['password']);
     }

     if (empty($username_err) && empty($password_err)) {
         $sql = "SELECT * FROM admin WHERE  username ='$username' AND password = '$password'";

         $result = mysqli_query($link, $sql);

         if (mysqli_num_rows($result) > 0) {
             session_start();
             $_SESSION['aloggedin'] = true;
             header('location:profile.php');
         } else {
             $error = "<div class='alert alert-danger'>
                       <strong>Login failed!</strong><br> Invalid emai-id or password!
                       </div>";
         }
     }
 }

 function test_input($data)
 {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 }




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/jquery-3.5.1.min.js">

</head>
<style>
    body {
        background: url('./images/login2.jpg');
    }

</style>

<body>

<div class="container mt-5 mb-5" >
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 p-5 " style="background: gainsboro ">
            <h1 class="title-1 m-0 mb-4">Admin Login</h1>
            <span class="text-danger"><?php echo $error; ?></span>
            <form class="" action="" method="POST">
                <div class="form-group">
                <i class="fa fa-envelope"></i> 
                    <label for="username">Username</label>
                    <input type="text" name="username" value="" class="form-control">
                    <span class="text-danger"><?php echo $username_err; ?> </span>

                </div>
                <div class="form-group">
                <i class="fa fa-key"></i>
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" class="form-control">
                    <span class="text-danger"><?php echo $password_err; ?>  </span>
                </div><br>
                <div class="form-group">
                    <input type="submit" name="submit" value="Login" class="btn btn-success btn-lg" style=" width: 100%;">
                </div>
            </form>
        </div>
    </div>
</div><br><br><br><br>

<?php

require_once 'footer.php';


