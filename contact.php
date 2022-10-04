<?php
include 'link.php';
include 'conn.php';
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

    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="images/download.png" style="width: 180px; height:auto;" alt="Devloper">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title badge-pill badge-primary" style="color: white; font-weight:bold; ">Muliya Navnit</h5>
                                <p class=" card-text" style=" text-align: justify;">Hello, I am <u style="color:#007BFF;">Muliya Navnit</u> <br> And I am study in SMT.Kamalaben Shantilal Kapashi BCA College. And our Project is E-Farm System And Project Manager is <u style="color:#007BFF;">Dr.Hettalben Barad</u>. </p>
                                <br><label for="">Programing Skils</label>
                                <div class=" progress" id="javascript">

                                    <div class="progress-bar" role="progressbar" style="width: 25%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">Javascript</div>
                                </div>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Css</div>
                                </div>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Html</div>
                                </div>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Boostrap</div>
                                </div>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 95%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">PHP</div>
                                </div>
                                <br>
                                <div class="col">
                                    <a href="#" style="color:#1878F3; font-size:25px; text-decoration:none;" class="fa fa-facebook"></a>
                                    <a href="#" style="color:#1DA1F3; font-size:25px; text-decoration:none;" class="fa fa-twitter"></a>
                                    <a href="#" style="color:#0274B6; font-size:25px; text-decoration:none;" class="fa fa-linkedin"></a>
                                    <a href="#" style="color:#EC1E23; font-size:25px; text-decoration:none;" class="fa fa-youtube"></a>
                                    <a href="#" style="color:#7039C3; font-size:25px; text-decoration:none;" class="fa fa-instagram"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="images/download.png" style="width: 180px; height:auto;" alt="Devloper">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title badge-pill badge-primary" style="color: white; font-weight:bold; ">Jemish Viradiya</h5>
                                <p class=" card-text" style=" text-align: justify;">Hello, I am <u style="color:#007BFF;">Jemish Viradiya</u><br> And I am study in SMT.Kamalaben Shantilal Kapashi BCA College. And our Project is E-Farm System And Project Manager is <u style="color:#007BFF;">Dr.Hettalben Barad</u>. </p>
                                <br><label for="">Programing Skils</label>
                                <div class=" progress" id="javascript">

                                    <div class="progress-bar" role="progressbar" style="width: 25%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">Javascript</div>
                                </div>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Css</div>
                                </div>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Html</div>
                                </div>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Boostrap</div>
                                </div>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 95%; color:black; background-color:#F75431; border-radius:10px; " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">PHP</div>
                                </div>
                                <br>
                                <div class="col">
                                    <a href="#" style="color:#1878F3; font-size:25px; text-decoration:none;" class="fa fa-facebook"></a>
                                    <a href="#" style="color:#1DA1F3; font-size:25px; text-decoration:none;" class="fa fa-twitter"></a>
                                    <a href="#" style="color:#0274B6; font-size:25px; text-decoration:none;" class="fa fa-linkedin"></a>
                                    <a href="#" style="color:#EC1E23; font-size:25px; text-decoration:none;" class="fa fa-youtube"></a>
                                    <a href="#" style="color:#7039C3; font-size:25px; text-decoration:none;" class="fa fa-instagram"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <?php

    if ($chek) {
    ?>
        <div class="text-center"">
       <?php echo $_SESSION['email']; ?>
        </div>
        <?php
        echo "***";
    } elseif (!($chek)) {
        ?>
        <div class=" text-center"">



            <button type=" button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Admin Login
            </button>
        </div>
    <?php
    } else {
    }
    ?>
    <br>

    <?php

    $te = "admin@gmail.com";
    $tp = "admin";


    if (isset($_POST['asubmit'])) {
        $sae = $_POST['e'];
        $sap = $_POST['p'];

        $_SESSION['email'] = $te;
        echo $_SESSION['emaila'];

        if ($te == $sae) {
            if ($tp == $sap) {
    ?>
                <div class="text-center"> <a href="dashboardadmin.php" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Admin Dashboard</a>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <strong>Your Password is Wrong</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong>Your Email is Wrong</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php
        }
    }

    ?>

</body>

</html>

<!-- Modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Admin Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="e" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" name="p" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <button type="submit" name="asubmit" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
</div>