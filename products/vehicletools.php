<?php
include '../link.php';
include '../conn.php';
session_start();
error_reporting(0);
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
    <div class="row row-cols-1 row-cols-md-5">
        <?php
        $farmvehicles = "Vehicle Tools";
        $farmvehiclesq = "SELECT * FROM `products` WHERE `productcategory`='$farmvehicles'";
        $farmvehiclest = mysqli_query($con, $farmvehiclesq);
        while ($farmvehiclesty = mysqli_fetch_array($farmvehiclest)) {
        ?>
            <div class="col mb-4" style="border-radius: 50px;">
                <div class="card">
                    <img src="../<?php echo $farmvehiclesty['productimage'];  ?>" class="card-img-top" height="350px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $farmvehiclesty['productname'];  ?></h5>
                        <p class="card-text"><?php echo $farmvehiclesty['productdiscription']; ?></p>
                        <h6 class="card-title">₹<?php echo $farmvehiclesty['price'];  ?></h6>
                        <a href="../psave.php?id=<?php echo $farmvehiclesty['id']; ?>" class="btn btn-primary"><i class="fas fa-heart"></i>&nbsp; Add to Wishlist</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
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