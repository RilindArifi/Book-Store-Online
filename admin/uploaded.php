<?php

require_once '../config.php';
$sql = "INSERT INTO libra values('img')";

$result = mysqli_query($link, $sql);



if($result){
    move_uploaded_file("book_img/", "img");
}




?>