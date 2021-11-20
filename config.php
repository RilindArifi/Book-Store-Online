<?php


$host = "localhost";
$user = "root";
$pass = "";
$dbname = "liberonline";

try{
    $link = new mysqli($host, $user, $pass, $dbname);
}
catch(Exception $e)
{
     $e->getMessage();
}



?>