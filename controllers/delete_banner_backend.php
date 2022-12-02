<?php
session_start();
require_once '../database/env.php';//Include batabase
$id = $_GET['id'];
$query = "SELECT images FROM banners WHERE id = '$id'";
$selectQuery = mysqli_query($connection, $query);
$fetch = mysqli_fetch_assoc($selectQuery);
$oldPath = "../uploads/banners/" . $fetch['images'];
if(file_exists($oldPath)){
    unlink($oldPath);
    $query = "DELETE FROM banners WHERE id = '$id'";
    $deleteQuery = mysqli_query($connection, $query);
    if($deleteQuery){
        $_SESSION['success_delete_msg'] = 'Selected post successfully delete.';
        header('Location: ../deshboard/all_banners.php');//After delete redirect all banners page
    }
}

?>