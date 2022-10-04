<?php

include 'conn.php';

$id = $_GET['id'];

$q = "DELETE FROM `efarmsystem`.`products` WHERE id=$id";

mysqli_query($con, $q);

header('location:dashboardadmin.php');
