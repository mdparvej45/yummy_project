<?php
session_start();
require_once '../database/env.php';
if(isset($_POST['submit'])){
    $request = $_POST;
    $image = $_FILES['image'];
    $img_name = $image['name'];
    $img_ext = pathinfo($img_name)['extension'];
    $food_catagory = $request['food_catagory'];
    $title = $request['title'];
    $rate = $request['rate'];
    $detiles = $request['detiles'];
    $uniq_img = 'Food-' . uniqid() . '.' . $img_ext;
    // var_dump($image);
    // exit(); 
    $errors = [];
    if(empty($image['name'])){
        $errors['img_error'] = 'Please input your food image.';
    }elseif($img_ext !== 'jpg' AND $img_ext !== 'JPG' AND $img_ext !== 'jpeg' AND $img_ext !== 'JPEG' AND $img_ext !== 'png' AND $img_ext !== 'PNG' AND $img_ext !== 'svg'){
        $errors['img_error'] = 'Your must be jpg jpeg png or svg.';
    }elseif($image['size'] > 4000000){
        $errors['img_error'] = 'Your food image must be less then 4 MB.';
    }if(empty($food_catagory)){
        $errors['catagory_error'] = 'Please select food catagory.';
    }if(empty($title)){
        $errors['title_error'] = 'Please select food catagory.';
    }if(empty($detiles)){
        $errors['detiles_error'] = 'Please input food detiles.';
    }elseif(strlen($detiles) > 100){
        $errors['detiles_error'] = 'Your detiles must be less then 100 Charcher.';
    }if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        $_SESSION['no_success_msg'] = 'Something is wrong! Please try again';
        header('Location: ../deshboard/add_menus.php');
    }else{
            move_uploaded_file($image['tmp_name'], '../uploads/foods/' . $uniq_img);
            $query = "INSERT INTO foods(title, detiles, rate, image, catagory_id) VALUES ('$title', '$detiles', '$rate', '$uniq_img', '$food_catagory')";
            $insert_query = mysqli_query($connection, $query);
            $_SESSION['success_msg'] = 'Okay! Your food is added successfully.';
            header('Location: ../deshboard/add_menus.php');
    }
}