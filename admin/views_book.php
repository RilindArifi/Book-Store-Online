<?php

require_once 'header.php';
require_once 'logincheck.php';
require_once '../config.php';

$output = "";
if (isset($_POST['search'])) {
    $book_id  = test_input($_POST['book_id']);
    $sql = "SELECT * FROM `libra` WHERE book_id = '$book_id'";
    
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        $output .= '<table class="table" border=1>
        <tr>
        <th>Book_id</th>
            <th>Book_name</th>
            <th>Autor</th>
            <th>Pagesa</th>
            <th>Img</th>
        </tr>';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
        <tr>
        <td>' . $row['book_id'] . '</td>
            <td>' . $row['book_name'] . '</td>
            <td>' . $row['autor'] . '</td>
            <td>' . $row['Pagesa'] . '</td>
        </tr>';
        }
        $output .= '</table>';
    } else {
        $output = '<div class ="alert alert-danger">No record found</div>';
    }
}
if (isset($_POST['all'])) {
    $sql = "SELECT * FROM `libra`";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        $output .= '<table class="table" border=1>
            <tr>
            <th>Book_id</th>
            <th>Book_name</th>
            <th>Autor</th>
            <th>Pagesa</th>
            <th>Img</th>
            </tr>';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
            <tr>
            <td>' . $row['book_id'] . '</td>
            <td>' . $row['book_name'] . '</td>
            <td>' . $row['autor'] . '</td>
            <td>' . $row['Pagesa'] . '</td>
            <td><img src="' . $row["img"] . '"height ="100" width="100"></td>
            </tr>';
        }
        $output .= '</table>';
    } else {
        $output = '<div class ="alert alert-danger">No record found</div>';
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
                <input class="form-control mr-sm-2" name="book_id" type="search" placeholder="Shkruaj ID e librit" aria-label="Search">
                <input class="btn btn-outline-primary my-2 my-sm-0" name="search" value="Kerko" type="submit"> &nbsp; &nbsp;
                <button class="btn btn-outline-primary my-2 my-sm-0" name="all" type="submit">Shiko te Gjith</button>
              <?php  
                   if(isset($_POST['managebook'])){
                       header('location: manage_book.php');
                   }
              ?>  <button name="managebook" class="btn btn-primary p-2" style="width: 20%; margin-left:auto;"><i class="fa fa-undo">&nbsp;</i>Manage book</button>
            </form><br><br>
            <?php
            echo $output;
            ?>
        </div>
    </div>
    
</div>