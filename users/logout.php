<?php

session_start();

//
//sesson_unset($_SESSION['login']);
//session_unset($_SESSION['name']);

session_destroy();
header('location: login.php');
