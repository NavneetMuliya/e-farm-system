<?php
include 'conn.php';
session_start();
$id = $_GET['id'];
$em =  $_SESSION['email'];


mysqli_query($con, "DELETE FROM `wishlists` WHERE `id`='$id' AND `email`='$em'");
mysqli_query($con, "DELETE FROM `message` WHERE `id`='$id' AND `email`='$em'");
header('location:' . $_SERVER['HTTP_REFERER']);
