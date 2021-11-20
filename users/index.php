<?php
require_once './header.php';
require_once '../config.php';

$output = "";
?>

<style>
    body{
        background-image: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <table class="sidebar">
                <tr><td>CATEGORIES</td></tr>
                <tr><td><a href="romane.php">Romane</a></td></tr>
                <tr><td><a href="histori.php">Histroi</a></td></tr>
                <tr><td><a href="business_management.php">Business & Management</a></td></tr>
                <tr><td><a href="novels.php">Novles</a></td></tr>
                <tr><td><a href="comics.php">Comics</a></td></tr>
                <tr><td><a href="indian_writing.php">Indian Writing </a></td></tr>
            </table>
        </div>
        <div class="col-sm-9">
                <div class="tag " >Romane</div>
                <div class="row mt-0">

                    <?php

                        $sql = "SELECT * FROM libra WHERE categoria='Roman' ORDER BY book_id ASC";

                       $result =mysqli_query($link, $sql);



                        while($row = mysqli_fetch_array($result)) {
                            $output .= '<div class="col-sm-4 " class="prodouct"><br>
                            <img src="'.$row['img'].'"width="80%" height="200"><br>
                                <h5 style="font-size:medium; margin-top: 10px">' . $row['book_name'] . '</h5>
                                <h5 style="font-size:x-small">'.$row['autor'].'</h5>
                                <h5 style="font-size:larger; color: red  " >&#8364;'.$row['Pagesa']. '</h5>
                                <form name="form" method="post"> 
                                       <input type="hidden" name="book_id" id="book_id' .$row['book_id'].'" value="' . $row['book_id'].'">
                                        <input type="hidden" name="book_name" id="book_name'.$row['book_id'].'" value="'.$row['book_name'].'">
                                         <input type="hidden" name="img" id="img'.$row['book_id'].'" value="'.$row['img'] . '">
                                          <input type="hidden" name="Pagesa" id="Pagesa'.$row['book_id'].'"value="'.$row['Pagesa'].'">';

                            if (!isset($_SESSION['loggedin'])) {

                                $output .= '<input type="submit" name="submit" value="Add To Card"
                                                    id="login'.$row['book_id'].'"  class="btn btn-primary" style="width:80%; background-color: crimson"> ';
                            } else {
                                $output .= '<input type="submit" name="submit" value="Add to card" 
                                                   id="login' .$row['book_id'].'  class="btn btn-primary" style="width:80%;background-color: crimson" >';
                                                   
                                              } 
                                               $output.='</form></div>';
                            }
                          echo $output;
                    ?>

                </div>
            <br>

                    <div class="tag2">Histori</div>
                    <div class="row mt-0">

                        <?php

                        $sql = "SELECT * FROM libra WHERE categoria='Histori' ORDER BY book_id ASC";

                        $result2 =mysqli_query($link, $sql);


                        $output='';
                        while($row = mysqli_fetch_array($result2)) {
                            $output .= '<div class="col-sm-4 " class="prodouct"><br>
                            <img src="'.$row['img'].'"width="80%" height="200">
                                <h5 style="font-size:medium; margin-top: 10px">' . $row['book_name'] . '</h5>
                                <h5 style="font-size:x-small">'.$row['autor'].'</h5>
                                <h5 style="font-size:larger; color: red  " >&#8364;'.$row['Pagesa']. '</h5>
                                <form name="form" method="post">
                                       <input type="hidden" name="book_id" id="book_id' .$row['book_id'].'" value="' . $row['book_id'].'">
                                        <input type="hidden" name="book_name" id="book_name'.$row['book_id'].'" value="'.$row['book_name'].'">
                                         <input type="hidden" name="img" id="img'.$row['book_id'].'" value="'.$row['img'] . '">
                                          <input type="hidden" name="Pagesa" id="Pagesa'.$row['book_id'].'"value="'.$row['Pagesa'].'">';

                            if (!isset($_SESSION['loggedin'])) {

                                $output .= '<input type="submit" name="submit" value="Add To Card"
                                                    id="login'.$row['book_id'].'"  class="btn btn-primary" style="width:80%; background-color: crimson"> ';
                            } else {
                                $output .= '<input type="submit" name="submit" value="Add to card"
                                                   id="login' .$row['book_id'].'  class="btn btn-primary" style="width:80%;background-color: crimson" >';

                            }
                            $output.='</form></div>';
                        }
                        echo $output;
                        ?>
                        <div class="more">

                        </div>
                        <br>
                    </div>
        </div>

    </div>
</div>

<?php
require_once '../admin/footer.php';
