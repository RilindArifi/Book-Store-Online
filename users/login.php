<?php
session_start();
require_once './header1.php';
require_once '../config.php';


$username = $password = "";
$username_err =  $password_err = $error = "";

if (isset($_POST['submit'])) { 
    if (empty($_POST['username'])) {
        $username_err = "&#10005;&nbsp; Please enter username";
    }
    else{
        $username = $_POST['username'];
    }
    if (empty($_POST['password'])) {
        $password_err = "&#10005;&nbsp;Plase enter pasword ";
    }
    else{
        $password =$_POST['password'];
    } 

    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT * FROM `login` WHERE  username ='$username' AND password = '$password'";

        $result = mysqli_query($link, $sql);

        if(mysqli_num_rows($result)>0){
                $_SESSION['aloggedin'] =true;
                header('location: index.php');
            }
            else{
                $error = '<div class="alert alert-danger">Invalid username or password </div>';
            }
        }
//        else{
//            $error = '<div class="alert alert-danger">Login failed</div>';
//        }

    }









?>



<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 p-5 " style="background: gainsboro ">
            <h1 class="title-1 m-0 mb-4">User Login</h1>
            <span class="text-danger"><?php echo $error; ?></span>
            <form class="" action="" method="POST">
                <div class="form-group">
                    <i class="fa fa-envelope"></i> 
                    <label for="username">Email</label>
                    <input type="email" name="username" value="" class="form-control">
                    <span class="text-danger"><?php echo $username_err; ?> </span>
                </div>
                <div class="form-group">
                    <i class="fa fa-key"></i>
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" class="form-control">
                    <span class="text-danger"><?php echo $password_err; ?> </span>
                </div><br>
                <div class="form-group">
                    <input type="submit" name="submit" value="Login" class="btn btn-success btn-lg" style=" width: 100%;">
                </div>
            </form>
        </div>
    </div>
</div>
<br><br><br>

<?= require_once '../admin/footer.php'; ?>

</body>

</html>