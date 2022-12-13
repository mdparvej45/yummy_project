<?php
session_start();
require_once '../database/env.php';
if(isset($_POST['submit_catagory'])){
    $catagory = strtolower($_POST['catagory']);
    
    $errors = [];
    if(empty($catagory)){
        $errors['catagory_error'] = 'Please input a new Catagory.';
    }elseif(strlen($catagory) > 16){
        $errors['catagory_error'] = 'Your catagory nust be less then 15 charcter.';
    }if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        header('Location: ../deshboard/add_menus.php');
    }
    else{
        $query = "INSERT INTO catagories(catagories) VALUES ('$catagory')";
        $insert_query = mysqli_query($connection, $query);
        if($insert_query){
            $_SESSION['errors'] = $errors;
            $_SESSION['success_msg'] = 'Your catagory successfully submit.';
            header('Location: ../deshboard/add_menus.php');
        }else{
            $_SESSION['no_success_msg'] = 'Something is wrong, Please try again.';
            header('Location: ../deshboard/add_menus.php');
        }
    }
}