<?php
session_start();
require_once '../database/env.php';
$id = $_GET['id'];
$status = $_GET['status'];
if($status == 0){
    $query = "UPDATE banners SET status ='1' WHERE id = '$id'";
    $updateQuery = mysqli_query($connection, $query);
    $_SESSION['status'] = 'Your status successfully Active';
    header('Location: ../deshboard/all_banners.php');
}else{
    $query = "UPDATE banners SET status ='0' WHERE id = '$id'";
    $updateQuery = mysqli_query($connection, $query);
    $_SESSION['status'] = 'Your status successfully De-active';
    header('Location: ../deshboard/all_banners.php');
}

?>