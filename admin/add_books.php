<?php

require_once 'header.php';
require_once 'logincheck.php';
include_once '../config.php';


$emri_librit_error = $Autori_error = $Pagesa_error = $Category_error = $foto_librit_error = "";
$emrilibrit = $Autori = $Pagesa = $Category = $fotolibrit= $status="";

if(isset($_POST['submit'])){

    //emri librit
    if(empty($_POST['emrilibrit'])){
        $emri_librit_error = "Ju lutemi shkruani emrin e librit";
    }else{

        $emrilibrit = test_input($_POST['emrilibrit']);
        $modeli_emrit = '/^[ a-zA-Z 0-9]+$/';
        if(!preg_match($modeli_emrit, $emrilibrit)){
            $emri_librit_error = "Ju lutemi shkrani Emrin pa shenja";
        }
    }

    //autori
    if(empty($_POST['Autori'])){
        $Autori_error = "Ju lutemi shkruani Autorin e librit";
    }else{

        $Autori = test_input($_POST['Autori']);
        $modeli_autorit = '/^[ .,a-zA-Z]+$/';
        if(!preg_match($modeli_autorit, $Autori)){
            $Autori_error = "Ju lutemi shkrani Autorin pa shenja";
        }
    }

    //pagesa
    if(empty($_POST['Pagesa'])){
        $Pagesa_error = "Ju lutemi shkruani Pagesen";
    }else{

        $Pagesa = test_input($_POST['Pagesa']);
        $modeli_pagesa = '/^[ .,0-9]+$/';
        if(!preg_match($modeli_pagesa, $Pagesa)){
            $Pagesa_error = "Ju lutemi shkrani Pagesen Vetem me numra";
        }
    }

    //categoria

    if(empty($_POST['Category'])){
        $Category_error = "Ju lutemi shkruani Category";
    }else{

        $Category = test_input($_POST['Category']);
        $modeli_Category = '/^[ a-zA-Z]+$/';
        if(!preg_match($modeli_Category, $Category)){
            $Category_error = "Ju lutemi shkrani Category pa shenja";
        }
    }

    //foto

    if(!isset($_FILES['fotolibrit'])){
        $foto_librit_error ="Ju lutemi zgjedhni foton";
    }else{
        $target ="book_img/";
        $file_name = $_FILES['fotolibrit']['name'];
        $file_type = $_FILES['fotolibrit']['type'];
        $file_size = $_FILES['fotolibrit']['size'];
        $tmp_name =$_FILES['fotolibrit']['tmp_name'];
        $allowed = array('jpg' => 'image/jpg','jpeg' =>'image/jpeg');



        if(!in_array($file_type,$allowed)){
            $foto_librit_error ="Ju lutemi selektoni jpg/jpeg file";
        }
        $maxsize = 1*1024*1024;
        if($file_size> $maxsize){
            $foto_librit_error="Madhsia e Fotos esht me e madhe se 1MB";
        }

        if(in_array($file_type,$allowed)&& $file_size<$maxsize && $_FILES['fotolibrit']['error']===0){
            $newname = rand().$file_name;
            $target = $target.$newname;
            $fotolibrit = $target;
            move_uploaded_file($tmp_name,$target);
        }

    }

    if(empty($emri_librit_error) && empty($Autori_error) && empty($Pagesa_error) && empty($Category_error) && empty($foto_librit_error)){
        $sql = "INSERT INTO libra values('','$emrilibrit','$fotolibrit','$Autori','','$Pagesa','$Category')";
        if(mysqli_query($link, $sql)){
            $status = '<div class="alert alert-success">The book has been successfully registered</div>';

        }else {
            $status ='<div class="alert alert-success">The book is not registered</div>';
        }
    }


}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<div class="container">
    <div class="row " >
        <div class="col ">
            <div class="row ml-5" >
                <div class="col-sm-5 ">
  
                    <span > <?php echo $status; ?></span>
                    <div class="alert alert-success" style="background-color: green; color:white; text-align:center">
                        <h5>Jepni te dhenat per te regjistruar Librin</h5>
                    </div>
                    
                    <form class="form  " method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="">Emri i Librit</label>
                            <input type="text" name="emrilibrit" value="" class="form-control">
                            <span class="text-danger"><?php echo $emri_librit_error; ?> </span>
                        </div>
                        <div class="form-group">
                            <label for="">Autori</label>
                            <input type="text" name="Autori" value="" class="form-control">
                            <span class="text-danger"><?php echo $Autori_error; ?> </span>
                        </div>
                        <div class="form-group">
                            <label for="">Pagesa</label>
                            <input type="text" name="Pagesa" value="" class="form-control">
                            <span class="text-danger"><?php echo $Pagesa_error; ?> </span>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <input type="text" name="Category" value="" class="form-control">
                            <span class="text-danger"><?php echo $Category_error; ?> </span>
                        </div>
                        <div class="form-group">
                            <label for="">Upload foton e librit</label>
                            <input type="file" name="fotolibrit" value="" class="form-control">
                            <span class="text-danger"><?php echo $foto_librit_error; ?> </span>
                        </div>
                        <div class="form-group text-align: center" >
                            <input type="submit" name="submit" value="Regjisto librin" class="btn btn-primary" style="width:60%; ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
