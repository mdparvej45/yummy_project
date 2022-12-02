<?php
session_start();
require_once '../database/env.php';
if(isset($_POST['post'])){
    $request = $_POST;
    $title = $request['title'];
    $detiles = $request['detiles'];
    $button = $request['button'];
    $button_link = $request['button_link'];
    $catagory = $request['catagory'];
    $catagory_title = $request['catagory_title'];
    $catagory_detiles = $request['catagory_detiles'];
    $errors = [];
    if(empty($title)){
        $errors['title_error'] = 'Please input your title';
    }elseif(strlen($title) > 50){
        $errors['title_error'] = 'Your title must be less then 50 character.';
    }if(empty($detiles)){
        $errors['detiles_error'] = 'Please input your detiles.';
    }if(empty($button)){
        $errors['button_error'] = 'Please input button name';
    }elseif(strlen($button) > 20){
        $errors['button_error'] = 'Your button name must be less then 20 character.';
    }if(empty($button_link)){
        $errors['button_link_error'] = 'Please input button link';
    }if(empty($catagory)){
        $errors['catagory_error'] = 'Please select a catagory.';
    }if(empty($catagory_title)){
        $errors['catagory_error'] = 'Please input catagory title.';
    }elseif(strlen($catagory_title) > 30){
        $errors['catagory_error'] = 'Your catagory title must be less then 20 character.';
    }if(empty($catagory_detiles)){
        $errors['detiles_error'] = 'Please input your catagory detiles.';
    }elseif(strlen($catagory_detiles) > 60){
        $errors['detiles_error'] = 'Your detiles must be less then 60 character.';
    }if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        $_SESSION['no_success_msg'] = 'Something is worong! Please try again.';
        header('Location: ../deshboard/add_why_choose.php');
    }else{
        $query = "INSERT INTO why_choose(title, detiles, button_name, button_link, catagory, catagory_title, catagory_detiles) VALUES ('$title','detiles','$button','$button_link','$catagory','$catagory_title','$catagory_detiles')";
        $insertQuery = mysqli_query($connection, $query);
        $_SESSION['success_msg'] = 'Your data successfully insert.';
        header('Location: ../deshboard/index.php');
    }
}







?>