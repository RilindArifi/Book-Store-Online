<?php

require_once 'header.php';
require_once '../admin/logincheck.php';
require_once '../config.php';
?>

<div class="container">
        <div class="row mt-4">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-10 ml-5">
                <div class="alert alert-success" style="background-color: green; color:white; text-align:center">
                    <h5>Welcome in Admin Panel</h5>
                </div>
                <div class="card-deck">
                    <div class="card" style="width: 18rem;  ">
                        <img class="card-img-top" src="./images/icon.jpg" alt="users">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Views Users</h3>
                            <a href="views_users.php" class="btn btn-success" style="width: 100%;">Views Users</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="./images/book.jpg" alt="book" style="background: white">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Manage Books</h3>
                            <a href="manage_book.php" class="btn btn-success" style="width: 100%; ">View & Manage Books</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="./images/order2.jpg" alt="order">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Orders History</h3>
                            <a href="./orders.php" class="btn btn-success" style="width: 100%;">View & Manage Orders</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>