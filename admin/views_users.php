<?php
require_once 'header.php';
require_once 'logincheck.php';
require_once '../config.php';


$output="";
if(isset($_POST['search'])){
   $username  = test_input( $_POST['username']);
   
     $sql = "SELECT * FROM login WHERE  username ='$username'";
    $result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result)>0)
    {
        $output .= '<table class="table" border=1>
            <tr>
            <th>User_id</th>
            <th>Username</th>
            <th>Name</th>
            <th>Mobile</th>
            </tr>';
        while($row = mysqli_fetch_array($result)){
            $output .= '
            <tr>
            <td>'.$row['user_id'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['mobile'].'</td>
            </tr>';
        }
        $output .='</table>';
    }else{
        $output = '<div class ="alert alert-danger">No record found</div>';
    }
}
if(isset($_POST['all'])){
    $sql = "SELECT * FROM `login`";
    $result = mysqli_query($link,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $output .= '<table class="table" border=1 >
            <tr>
            <th>User_id</th>
            <th>Username</th>
            <th>Name</th>
            <th>Mobile</th>
            </tr>';
        while($row = mysqli_fetch_array($result)){
            $output .= '
            <tr>
            <td>'.$row['user_id'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['mobile'].'</td>
            </tr>';
        }
        $output .='</table>';
    }
    else{
        $output= '<div class ="alert alert-danger">No record found</div>';
    }

}



function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-10 ml-5">
            <form class="form-inline  ml-5" method="POST">
                <input class="form-control mr-sm-2" name="username" type="text" placeholder="Enter username" aria-label="Search">
                <input class="btn btn-outline-primary my-2 my-sm-0" name="search" value="Search" type="submit"> &nbsp; &nbsp;
                <button class="btn btn-outline-primary my-2 mb-5 my-sm-0" name="all"  type="submit">View All</button><br><br><br><br>
            </form>

            <?php
            echo $output;
            ?>
        </div>
    </div>
</div>
