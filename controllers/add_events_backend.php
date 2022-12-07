<?php
session_start();
require_once '../database/env.php';//Include database
if(isset($_POST['submit'])){
    $request = $_POST;
    $catagory = $request['catagory'];
    $rate = $request['rate'];
    $detiles = $request['detiles'];
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageExt = pathinfo($imageName)['extension'];
    $errors = [];
    if(empty($rate)){
        $errors['rate_error'] = 'Please input parties rate';
    }if(empty($detiles)){
        $errors['detiles_error'] = 'Please input parties detiles';
    }if(empty($imageName)){
        $errors['image_error'] = 'Please input an event image';
    }elseif($imageExt !== 'jpg' AND $imageExt !== 'JPG' AND $imageExt !== 'jpeg' AND $imageExt !== 'JPEG' AND $imageExt !== 'png' AND $imageExt !== 'PNG' AND $imageExt !== 'svg'){
        $errors['image_error'] = 'Your Image must be jpg, jpeg, png or svg format.';
    }elseif($image['size'] > 4000000){
        $errors['image_error'] = 'Your Image must be less then $ MB';
    }if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        $_SESSION['no_success_msg'] = 'Something is missing! Please try again.';
        header('Location: ../deshboard/add_events.php');
    }else{
        $new_image_name = 'Event-' . uniqid() . '.' . $imageExt;
        move_uploaded_file($image['tmp_name'], '../uploads/events/' . $new_image_name);
        $query = "INSERT INTO events(images, catagory, rate, detiles) VALUES ('$new_image_name','$catagory','$rate','$detiles')";
        $insertQuery = mysqli_query($connection, $query);
        $_SESSION['success_msg'] = 'Well done!  Your Events successfully submit';
        header('Location: ../deshboard/add_events.php');

        
    }
}