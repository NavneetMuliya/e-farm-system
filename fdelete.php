<?php

include 'conn.php';

$id = $_GET['id'];

$q = "DELETE FROM `feedbacks` WHERE id=$id";

mysqli_query($con, $q);

header('location:dashboardadmin.php');
