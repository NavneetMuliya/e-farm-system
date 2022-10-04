<?php
include 'conn.php';
include 'link.php';
session_start();
error_reporting(0);

if ($_SESSION['email']) {
    $id = $_GET['id'];
    echo $id;
    $q = "SELECT * FROM `products` WHERE `id`='$id'";

    $tq = mysqli_query($con, $q);
    $sq = mysqli_fetch_array($tq);
    $sem = $_SESSION['email'];
    $spi = $sq['productimage'];
    $spn = $sq['productname'];
    $spd = $sq['productdiscription'];
    $spr = $sq['price'];

    $pq = "INSERT INTO `wishlists`(`id`, `email`, `productimage`, `productname`, `productdiscription`, `price`) VALUES ('$id','$sem','$spi','$spn','$spd','$spr')";
    mysqli_query($con, $pq);

    $pu = "SELECT * FROM `products` WHERE `id`='$id'";
    $put = mysqli_query($con, $pu);
    $pur = mysqli_fetch_array($put);

    $id2 = $pur['id'];
    $email2 = $pur['email'];
    $mobile2 = $pur['mobile'];
    $fnamee = $_SESSION['firstname'];
    $lname = $_SESSION['lastname'];
    $mm = $_SESSION['mobile'];
    $pmq = "INSERT INTO `message`(`id`,`firstname`,`lastname`, `email`,`mobile`,`id2`, `email2`,`mobile2`, `pimage`, `pname`, `price`) VALUES ('$id','$fnamee','$lname','$sem','$mm','$id2','$email2','$mobile2','$spi','$spn','$spr')";
    mysqli_query($con, $pmq);

    header('location:' . $_SERVER['HTTP_REFERER']);
} else {
?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap');

            * {
                font-family: 'Ubuntu Mono', monospace;
            }

            .radhe {
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
        <div class="alert alert-danger alert-dismissible fade show text-center radhe" role="alert">
            <strong>Please First </strong>Register Or Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <script>
            setTimeout(function() {
                history.back();
            }, 3000);
        </script>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
    </body>

    </html>




<?php
}
?>