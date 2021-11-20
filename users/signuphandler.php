<?php

require_once '../config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$output ="";

if(empty($name) || empty($email) || empty($mobile) || empty($password))
{
    $output = '<div class="alert alert-danger">Error try again</div>';

}else{

    $sql = "INSERT INTO login (user_id, username, password, name, mobile) VALUES(?,?,?,?,?) ";
    $stmt = mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($stmt,'issss',$param_id, $param_username,$param_password,$param_name,$param_mobile);
    $param_id = '';
    $param_username= $email;
    $param_password= password_hash($password,PASSWORD_DEFAULT);
    $param_name = $name;
    $param_mobile = $mobile;

    
    if(!mysqli_stmt_execute($stmt))
    {
        $output = '<div class="alert alert-danger">Singup successful</div>';
    }
    else{
        
        $output = '<div class="alert alert-danger">Error Occured</div>';
    }
}
echo $output;
