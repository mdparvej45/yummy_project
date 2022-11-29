<?php
session_start();
require_once '../database/env.php';//Include batabase
$id = $_GET['id'];
$query = "DELETE FROM banners WHERE id = '$id'";
$deleteQuery = mysqli_query($connection, $query);
$_SESSION['success_delete_msg'] = 'Selected post successfully delete.';
header('Location: ../deshboard/all_banners.php');//After delete redirect all banners page
?>