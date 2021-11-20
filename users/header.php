<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../admin/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    body {
        background: url('./images/regjister.jpg');
    }

    label {
        color: black;
    }
    .sidebar tr td{
        width: 200%;
        height: 39px;
        text-align: center;
        border-collapse: collapse;
    }
    .sidebar tr:nth-child(even){
        background-color: dimgray;
    }
    .sidebar tr:nth-child(odd){
        background-color: dimgray;
    }
    .sidebar tr:nth-child(1){
        background-color:  darkcyan;
        color: white;
    }
    .sidebar tr td a{
        color: white;
        text-decoration: none;

    }
    .tag{
        width: 100%;
        display: inline-table;
        height: 30px;
        background-color:  darkcyan;
        text-align: center;
        font-weight: bold;
        color: white;
    }

    .tag2{
        margin-top: 70px;
        width: 100%;
        display: inline-table;
        height: 30px;
        background-color:  darkcyan;
        text-align: center;
        font-weight: bold;
        color: white;
    }
</style>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mr-t">
            <a class="navbar-brand" href="profile.php">
                <h2>BookOnline</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php

                        if(isset($_SESSION['aloggedin'])){
                            echo '<a class="nav-link" href="card.php"><strong>
                                  Bag<i class="fa fa-shopping-cart"></i>&nbsp;<span id="card" 
                                  class="badge  badge-warning"  style="border-radius: 50%">2</span></strong></a>
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      My Account
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <h5 class="dropdown-header">Hello, User</h5>
                                      <a class="dropdown-item" href="profile.php" ><i class="fa fa-user"></i>&nbsp;My Profile</a>
                                      <a class="dropdown-item" href="change_password.php" ><i class="fa fa-key"></i>&nbsp;Change Password</a>
                                      <a class="dropdown-item" href="orders.php"><i class="fa fa-cube"></i>&nbsp;Orders</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                                    </div>
                                  </li>';
                        }else{
                            echo '<li class="nav-item">
                                        <a class="nav-link" href="login.php">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="signup.php">Signup</a>
                                    </li>';
                        }



                        ?>



                </ul>
            </div>
        </nav>
    </div>