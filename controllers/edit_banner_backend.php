<?php
session_start();
require_once '../database/env.php';
if(isset($_POST['post'])){
    $id = $_GET['id'];
    $request = $_POST;
    $title = $request['title'];
    $button_name1 = $request['button'];
    $button_link1 = $request['button_link'];
    $button_video = $request['video_button'];
    $button_link2 = $request['video_button_link'];
    $detiles = $request['detiles'];
    $banner_image = $_FILES['image'];
    $banner_image_name = $banner_image['name'];
    $extension = pathinfo($banner_image_name)['extension'];
    // var_dump($banner_image);
    // exit();
    $errors = [];
    if(empty($title)){
        $errors['title_error'] = 'Please input your title';
    }elseif(strlen($title) > 50){
        $errors['title_error'] = 'Your title must be less then 50 character.';
    }if(empty($button_name1)){
        $errors['buttton_name1_error'] = 'Please input your button name.';
    }elseif(strlen($button_name1) > 20){
        $errors['buttton_name1_error'] = 'Your button name must be less then 20 character.';
    }if(empty($button_link1)){
        $errors['button_link1_error'] = 'Please input button link';
    }if(empty($button_video)){
        $errors['button_video_error'] = 'Please input video button name';
    }elseif(strlen($button_video) > 20){
        $errors['button_video_error'] = 'Your  video button name must be less then 20 character.';
    }if(empty($button_link2)){
        $errors['button_video_link_error'] = 'Please input video button link';
    }if(empty($detiles)){
        $errors['detiles_error'] = 'Please input your detiles';
    }if($banner_image['size'] < 1){
        $errors['image_error'] = 'Please input banner image';
    }elseif($banner_image['size'] > 4000000){
        $errors['image_error'] = 'Banner image must be less then 4 MB';
    }elseif($extension !== 'jpg' AND $extension !== 'JPG' AND $extension !== 'jpeg' AND $extension !== 'JPEG' AND $extension !== 'png' AND $extension !== 'PNG' AND $extension !== 'svg'){
        $errors['image_error'] = 'You select a worong image!';
    }if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        $_SESSION['no_success_msg'] = 'Something is worong! Please try again.';
        header('Location: ../deshboard/add_banner.php');
    }else{
        $uniq_image = 'Banner-' . uniqid() . '.' . $extension;
        move_uploaded_file($banner_image['tmp_name'], "../uploads/banners/$uniq_image");
        $query = "INSERT INTO banners(title, detiles, button_name1, button_link1, button_video, button_video_link, images) VALUES ('$title', '$detiles', '$button_name1', '$button_link1', '$button_video', '$button_link2', '$uniq_image')";
        $insertQuery = mysqli_query($connection, $query);
        $_SESSION['post_success_msg'] = 'Your banner post successfully uploaded';
        header('Location: ../deshboard/all_banners.php');
    }




}




?>