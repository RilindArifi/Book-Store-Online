<?php
require_once 'header.php';
require_once 'logincheck.php';


?>

<div class="container">
    <div class="row mt-4">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-10 ml-5">
            <div class="alert alert-success" style="background-color: #1ea1ff!important; color:white; text-align:center">
                <h5>Manage Book</h5>
            </div>
            <div class="card-deck">
                <div class="card" style="width: 18rem;  ">
                    <img class="card-img-top" src="./images/add-book.png" alt="users">
                    <div class="card-body">
                        <h3 class="card-title text-primary">Add Books</h3>
                        <a href="./add_books.php" class="btn btn-primary" style="width: 100%;">Add Books</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./images/shiko-librin.jpg" alt="book">
                    <div class="card-body">
                        <h3 class="card-title text-primary">View Books</h3>
                        <a href="./views_book.php" class="btn btn-primary" style="width: 100%;">View Books</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./images/remove-book.jpg" alt="order">
                    <div class="card-body">
                        <h3 class="card-title text-primary">Delete Books</h3>
                        <a href="delete_book.php" class="btn btn-primary" style="width: 100%;">Delete Books</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
   
</div>
