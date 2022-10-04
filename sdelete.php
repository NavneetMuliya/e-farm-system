<?php

include 'conn.php';

$id = $_GET['id'];
echo $id;

$q = "DELETE FROM `slideshow` WHERE id=$id";

mysqli_query($con, $q);

header('location:dashboardadmin.php');
