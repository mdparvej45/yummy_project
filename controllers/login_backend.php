<?php
session_start();
require_once '../database/env.php';//Include database
$request = $_POST;
$user_email = $request['user_email'];
$password = $request['password'];
$encript_password = sha1($password);
if(empty($user_email)){
    $_SESSION['user_email_error'] = 'Please input your email.';
    header('Location: ../deshboard/login.php');
}if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['user_email_error'] = 'Please input a valid email.';
    header('Location: ../deshboard/login.php');
}if(empty($password)){
    $_SESSION['password_error'] = 'Please input your password.';
    header('Location: ../deshboard/login.php');
}else{
    $Query = "SELECT * FROM users_data WHERE email = '$user_email'";
    $searchEmail = mysqli_query($connection, $Query);
    if($searchEmail -> num_rows > 0){
        $query = "SELECT * FROM users_data WHERE password = '$encript_password'";
        $searchPassword = mysqli_query($connection, $query);
        if($searchPassword -> num_rows > 0){
            $_SESSION['success_massage'] = 'Seccessfully login !';
            header('Location: ../deshboard/index.php');
        }else{
            $_SESSION['password_error'] = 'Your input password is wrong.';
            header('Location: ../deshboard/login.php');
        }
    }else{
        $_SESSION['user_email_error'] = 'Your input email did not match.';
        header('Location: ../deshboard/login.php');
    }
}

?>