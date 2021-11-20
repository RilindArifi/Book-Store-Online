<?php

require_once 'header.php';
require_once 'logincheck.php';
require_once '../config.php';

$output="";



    if(isset($_POST['btn_delete'])){
        if(empty($_POST['book_id'])){
            $output = '<div class ="alert alert-danger">Enter Book ID</div>';
        }else {
            $book_id = $_POST['book_id'];

            $sql = "DELETE FROM libra WHERE book_id = '$book_id'";

            if (mysqli_query($link, $sql)) {
                $output = '<div class ="alert alert-success">Delete the book is successful</div>';
            } else {
                $output = '<div class ="alert alert-danger">The book not delete book</div>';
            }
        }
    }


?>

<div class="container">
    <div class="row mt-4">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-10 ml-5">
            <form class="form-inline  ml-5" method="POST">
                <input class="form-control mr-sm-2" name="book_id" type="text" placeholder="Enter book ID" aria-label="Search">
                <input class="btn btn-outline-primary my-2 my-sm-0" name="btn_delete" type="submit" value="Delete Book" >&nbsp; &nbsp;
                <?php  
                   if(isset($_POST['managebook'])){
                       header('location: manage_book.php');
                   }
              ?>  <button name="managebook" class="btn btn-primary p-2" style="width: 20%; margin-left:auto;"><i class="fa fa-undo">&nbsp;</i>Manage book</button>
            </form>
            <br><br>
            <?php echo  $output;
            ?>
        </div>
    </div>
</div>
