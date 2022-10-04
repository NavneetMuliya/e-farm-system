<?php
include 'link.php';
include 'conn.php';
session_start();
error_reporting(0);
$ema = $_SESSION['email'];
$wcq = "SELECT COUNT(*) as id FROM `wishlists` WHERE email='$ema'";
$wcq2 = mysqli_query($con, $wcq);
$wqe = mysqli_fetch_assoc($wcq2);


$total = "SELECT sum(price) FROM `wishlists` WHERE email='$ema'";
$total2 = mysqli_query($con, $total);
$toto = mysqli_fetch_assoc($total2);

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
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="index.php">E-Farm</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-user"></i> &nbsp;<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php"><i class="fas fa-user-times"></i> &nbsp; Log out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-heart"></i> &nbsp;
                                Wishlist
                                <span class="badge badge-pill badge-primary" style="font-weight: bold;"><?php echo $wqe['id']; ?></span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#feedbackModal">
                                <i class="fas fa-comment-alt"></i> &nbsp;
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fas fa-home"></i> &nbsp;
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">
                                <i class="fas fa-address-book"></i> &nbsp;
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">
                                <i class="fas fa-eject"></i> &nbsp;
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" href="" data-target="#profileModal">
                                <i class=" fas fa-id-badge"></i> &nbsp;
                                Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- -----------------------------------------Profile Modal------------------------------------------------------------------------- -->
            <?php
            $fmail = $_SESSION['email'];
            $sq = "SELECT * FROM `efarmsystem`.`users` WHERE email='$fmail'";
            $m = mysqli_query($con, $sq);
            $pxl = (mysqli_fetch_array($m));
            ?>
            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" name="firstname" class="form-control" value="<?php echo $pxl['firstname']; ?>">
                                    </div>
                                    <div class=" col">
                                        <input type="text" name="lastname" class="form-control" value="<?php echo $pxl['lastname']; ?>">
                                    </div>
                                </div>
                                <br>
                                <div class=" form-row">
                                    <div class="col">
                                        <input type="text" name="mobile" class="form-control" value="<?php echo $pxl['mobile']; ?>">
                                    </div>
                                    <div class=" col">
                                        <input type="email" name="email" class="form-control" value="<?php echo $pxl['email']; ?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class=" form-row">
                                    <div class="col">
                                        <input type="password" name="password" class="form-control" value="<?php echo $pxl['password']; ?>">
                                    </div>
                                    <div class=" col">
                                        <input type="password" name="repassword" class="form-control" value="<?php echo $pxl['repassword']; ?>" Password">
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="inputCity"> &nbsp;City</label>
                                        <input type="text" name="city" value="<?php echo $pxl['city']; ?>" class=" form-control" id="inputCity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">State : <small><?php echo $pxl['state']; ?></small> </label>
                                        <select id="inputState" name="state" class="form-control">
                                            <option selected>Gujarat</option>
                                            <option>Andhra Pradesh</option>
                                            <option>Arunachal Pradesh</option>
                                            <option>Assam</option>
                                            <option>Bihar</option>
                                            <option>Chhattisgarh</option>
                                            <option>Goa</option>
                                            <option>Gujarat</option>
                                            <option>Haryana</option>
                                            <option>Himachal Pradesh</option>
                                            <option>Jharkhand</option>
                                            <option>Karnataka</option>
                                            <option>Kerala</option>
                                            <option>Madhya Pradesh</option>
                                            <option>Maharashtra</option>
                                            <option>Manipur</option>
                                            <option>Meghalaya</option>
                                            <option>Mizoram</option>
                                            <option>Nagaland</option>
                                            <option>Odisha</option>
                                            <option>Punjab</option>
                                            <option>Rajasthan</option>
                                            <option>Sikkim</option>
                                            <option>Tamil Nadu</option>
                                            <option>Telangana</option>
                                            <option>Tripura</option>
                                            <option>Uttar Pradesh</option>
                                            <option>Uttarakhand</option>
                                            <option>West Bengal</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip">Zip</label>
                                        <input type="text" name="zip" value="<?php echo $pxl['zip']; ?>" class=" form-control" id="inputZip">
                                    </div>
                                </div>
                                <div class="form-row text-center">
                                    <div class="col">
                                        <button type="submit" name="profileupdate" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

            <!-- -------------------------------------------------------------------------------------------------------------------------------- -->
            <?php

            if (isset($_POST['feedbackdone'])) {
                $femobile = $_SESSION['mobile'];
                $feemail = $_SESSION['email'];
                $feed = $_POST['feed'];
                $ferole = $_SESSION['role'];


                mysqli_query($con, "INSERT INTO `feedbacks`(`email`, `mobile`, `feedback`, `role`) VALUES ('$femobile','$feemail','$feed','$ferole')");
            }
            ?>

            <!-- Feedback Modal -->
            <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['email']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['mobile']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Discription:</label>
                                    <textarea class="form-control" name="feed" rows="5" id="comment"></textarea>
                                </div>
                                <div class="form-row text-center">
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="feedbackdone" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                <br>
                <?php
                if (isset($_POST['profileupdate'])) {
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $mobile = $_POST['mobile'];
                    $password = $_POST['password'];
                    $repassword = $_POST['repassword'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    $zip = $_POST['zip'];

                    $pass = password_hash($password, PASSWORD_BCRYPT);
                    $repass = password_hash($repassword, PASSWORD_BCRYPT);
                    if ($password == $repassword) {
                        $upq = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`mobile`='$mobile',`password`='$pass',`repassword`='$repass',`city`='$city',`state`='$state',`zip`='$zip' WHERE `email`='$fmail'";
                        mysqli_query($con, $upq);
                    } else {
                ?>
                        <div class="alert alert-warning alert-dismissible fade show  text-center" role="alert">
                            Password is not same! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    }
                }
                ?>
                <hr style="color: #E3F2FD;">
                <div class="text-center" style="color: #007BFF; font-weight:bold; "><i class="fas fa-heart"></i> &nbsp; Wishlist</div>
                <hr style="color: #E3F2FD;">
                <div data-spy="scroll" data-offset="0">
                    <div>
                        <table class="table" id="table2">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">pimage</th>
                                    <th scope="col">pname</th>
                                    <th scope="col">pdiscription</th>
                                    <th scope="col">price</th>
                                    <th scope="col">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $emailf = $_SESSION['email'];
                                $q = "SELECT * FROM `wishlists` WHERE email='$emailf' ";
                                $query = mysqli_query($con, $q);
                                while ($wish = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $wish['id']; ?></th>
                                        <td><img src="<?php echo $wish['productimage']; ?>" height="100px" width="100px" alt=""></td>
                                        <td><?php echo $wish['productname']; ?></td>
                                        <td><?php echo $wish['productdiscription']; ?></td>
                                        <td><?php echo $wish['price']; ?></td>
                                        <td> <a class="btn btn-outline-danger" href="wishde.php?id=<?php echo $wish['id']; ?>" role="button">Delete</a>
                                        </td>

                                    </tr>

                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">Total :</td>
                                    <td style="color: red;">₹<?php echo $toto['sum(price)']; ?></td>
                                    <td></td>

                                </tr>
                            </tbody>
                        </table> <span id="val"></span>
                    </div>
                </div>
            </main>
        </div>
    </div>



</body>

</html>