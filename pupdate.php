<?php
include 'link.php';
include 'conn.php';
session_start();

$id = $_GET['id'];
$pq = "SELECT * FROM `efarmsystem`.`products` WHERE id='$id'";
$pname = mysqli_query($con, $pq);
($re = mysqli_fetch_array($pname));



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e762c24570.js" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap');

        * {
            font-family: 'Ubuntu Mono', monospace;
        }
    </style>
</head>

<body>
    <?php

    if (isset($_POST['updatepdone']) or isset($_FILES['updatepdone'])) {
        $productimage = $_FILES['pimage'];
        $productname = $_POST['pname'];
        $price = $_POST['price'];
        $productcategory = $_POST['pcategory'];

        $image_loc = $_FILES['pimage']['tmp_name'];
        $image_name = $_FILES['pimage']['name'];
        $img_des = "images/" . $image_name;
        move_uploaded_file($image_loc, "images/" . $image_name);

        // $filename = $productimage['name'];
        // $filetmp_name = $productimage['tmp_name'];
        // $fileerror = $productimage['error'];

        // if ($fileerror == 0) {
        //     $filedestination = 'images/' . $filename;
        //     move_uploaded_file($filetmp_name, $filedestination);
        // } else {
        // }


        $query = "UPDATE `efarmsystem`.`products` SET `productimage`='$img_des',`productname`='$productname',`price`='$price',`productcategory`='$productcategory' WHERE id=$id";
        $q = mysqli_query($con, $query);
        header('location:dashboardseller.php');
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm" style="margin-top: 40px;">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <img src="<?php echo $re['productimage']; ?>" class="img-fluid" style="height: 200px; width:100%;" alt="...">
                    </div>
                    <div class="form-group">
                        <input type="file" name="pimage" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="pname" type="text" value="<?php echo $re['productname']; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="price" type="text" value="<?php echo $re['price']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pcate">Old : <?php echo $re['productcategory']; ?></label>
                        <select class="form-control" id="pcate" name="pcategory">
                            <option>Farm-vehicles</option>
                            <option>Vehicle Tools</option>
                            <option>Old Products</option>
                            <option>Small Instruments</option>
                            <option>Other tools</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Discription:</label>
                        <textarea class="form-control" placeholder="<?php echo $re['productdiscription']; ?>" name="pdiscription" rows="5" id="comment" readonly></textarea>
                    </div>
                    <div class="form-row text-center">
                        <div class="col">
                            <button type="submit" name="updatepdone" class="btn btn-primary">update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>


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