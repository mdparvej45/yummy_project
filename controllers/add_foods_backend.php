<?php
session_start();
require_once '../database/env.php';
if(isset($_POST['submit'])){
    $request = $_POST;
    $image = $_FILES['image'];
    $food_catagory = $request['food_catagory'];
    $title = $request['title'];
    $rate = $request['rate'];
    $detiles = $request['detiles'];
    $errors = [];
    if(empty($image['name'])){
        $errors['img_errors'] = 'Please input your food image';
    }
}