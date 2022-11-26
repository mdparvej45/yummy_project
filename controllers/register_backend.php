<?php
session_start();
require_once '../database/env.php';//Include database
$request = $_POST;
$errors = [];
if(isset($request['register_button'])){
    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $user_email = $request['user_email'];
    $password = $request['password'];
    $repeat_password = $request['repeat_password'];
    $encript_password = sha1($repeat_password);
    if(empty($first_name)){
        $errors['first_name_error'] = 'Please input your first name.';
    }elseif(strlen($first_name) > 15){
        $errors['first_name_error'] = 'Your first name must be less then 15 character.';
    }if(empty($last_name)){
        $errors['last_name_error'] = 'Please input your last name.';
    }elseif(strlen($last_name)){
        $errros['last_name_error'] = 'Your first name must be less then 15 character.';
    }if(empty($user_email)){
        $errors['user_email_error'] = 'Please input your new email';
    }elseif(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        $errors['user_email_error'] = 'Please input a valid email';
    }if(empty($password)){
        $errors['password_error'] = 'Please input your password.';
    }if(empty($repeat_password)){
        $errors['repeat_password_error'] = 'Please input your repeat password.';
    }elseif($password !== $repeat_password){
        $errors['repeat_password_error'] = 'Password did not match.';
    }if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        $_SESSION['denided_massage'] = 'Oops! Something is wrong. Please try again.';
        header('Location: ../deshboard/register.php');//Redirect registrion page
    }else{
        $query = "INSERT INTO users_data(first_name, last_name, email, password) VALUES ('$first_name','$last_name','$user_email','$encript_password')";//Insert all data on database
        $insertQuery = mysqli_query($connection, $query);
        $_SESSION['success_massage'] = 'Your registration is successfully completed.';
        header('Location: ../deshboard/login.php');
    }
}

?>