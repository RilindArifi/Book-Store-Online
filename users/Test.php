<?php

require_once '../config.php';

$sql = "SELECT * FROM `libra` ORDER BY `libra`.`img` DESC";

$result = mysqli_query($link, $sql);
$output = $row ="";


while($row = mysqli_fetch_array($result)) {
    $output .= '<div class="col-sm-4"><h1>Kuje bre</h1>
                            <img src="'.$row['img'].'"width="80%" height="200"> </div>';
}


echo $output;



