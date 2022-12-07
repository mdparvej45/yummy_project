<?php
session_start();
require_once '../database/env.php';//Include database
if(isset($_POST['title_post'])){
    $requset = $_POST;
    $title = $requset['title'];
    $detiles = $requset['detiles'];
    $errors = [];
    if(empty($title)){
        $errors['title_error'] = 'Please input your title';
    }elseif(strlen($title) > 50){
        $errors['title_error'] = 'Your title must be less then 50 character.';
    }if(empty($detiles)){
        $errors['detiles_error'] = 'Please input your detiles.';
    }elseif(strlen($detiles) < 60){
        $errors['detiles_error'] = 'Your title must be more then 60 character';
    }if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        $_SESSION['no_success_msg'] = 'Something is wrong! Please try again.';
        header('Location: ../deshboard/add_why_choose.php');
    }else{
        $query = "UPDATE why_choose SET title='$title',detiles='$detiles' WHERE 1";
        $updateQuery = mysqli_query($connection, $query);
        $_SESSION['success_msg'] = 'Okay ! Your catagory status is successfully update.';
        header('Location: ../deshboard/add_why_choose.php');
    }
}




