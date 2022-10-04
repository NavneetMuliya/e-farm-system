<?php
include 'link.php';
include 'conn.php';
session_start();
error_reporting(0);

?>

<?php
if (isset($_POST['ldone'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from `users` where `email`='$email'";
    $query = mysqli_query($con, $email_search);
    $email_count = mysqli_num_rows($query);

    if ($email_count) {
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];


        $pass_decode = password_verify($password, $db_pass);

        if ($pass_decode) {
            $_SESSION['firstname'] = $email_pass['firstname'];
            $_SESSION['lastname'] = $email_pass['lastname'];
            $_SESSION['email'] = $email_pass['email'];
            $_SESSION['mobile'] = $email_pass['mobile'];
            $_SESSION['role'] = $email_pass['role'];

            header('location:index.php');
        } else {
?>
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                Your Password Wrong!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            Your Email Wrong!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
}
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
    <!-- -----------------------------------------Registration------------------------------------------------ -->
    <?php
    if (isset($_POST['done'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $role = $_POST['role'];

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $repass = password_hash($repassword, PASSWORD_BCRYPT);
        $emailquery = "select * from efarmsystem.users where email='$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
    ?>
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                Your Email already exist!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        } else {
            if ($password === $repassword) {
                $insertquery = "INSERT INTO efarmsystem.users(firstname, lastname, mobile, email, password, repassword, city, state, zip, role) VALUES ('$firstname', '$lastname', '$mobile', '$email', '$pass', '$repass', '$city', '$state', '$zip', '$role')";
                $iquery = mysqli_query($con, $insertquery);
                if ($iquery) {
            ?>
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        Registration Sucessfuly Please Login
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show  text-center" role="alert">
                        Not insert data!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
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
    }
    ?>
    <?php
    if (isset($_POST['searchsu'])) {
        $searchname = $_POST['search'];
    }
    ?>
    <!-- ************************************Navbar***************************************** -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="index.php">E-Farm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> &nbsp;Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="products/farmvehicles.php"><i class="fas fa-tractor"></i>&nbsp;Farm-vehicles</a>
                        <a class="dropdown-item" href="products/vehicletools.php"><i class="fas fa-tools"></i>&nbsp;Vehicle Tools</a>
                        <a class="dropdown-item" href="products/oldproducts.php"><i class="fas fa-cog"></i>&nbsp;Old Products</a>
                        <a class="dropdown-item" href="products/smallinstruments.php"><i class="fas fa-cogs"></i>&nbsp;Small Instruments</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="products/otherstools.php"><i class="fas fa-tools"></i>&nbsp;Other tools</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><i class="fas fa-address-book"></i> &nbsp;Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php"><i class="fas fa-eject"></i> &nbsp;About Us</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="searchsu" type="submit"><i class="fas fa-search"></i></button>
            </form> &nbsp;

            <!-- Login Registration Button -->
            <?php
            $ae = "admin@gmail.com";
            if ($_SESSION['email'] == $ae) {
            ?>
                <a class="btn btn-outline-success my-sm-0 " href="dashboardadmin.php" role="button">Admin</a>

                <?php
            } else {
                $fname = $_SESSION['firstname'];
                if ($fname) {

                    $cemai = $_SESSION['email'];
                    $a = "SELECT * FROM `efarmsystem`.`users` WHERE email='$cemai' ";
                    $query = mysqli_query($con, $a);

                    $res = mysqli_fetch_array($query);
                    $role = $res['role'];

                    $b = "Buyer";
                    if ($b == $role) {
                ?>
                        <a class="btn btn-outline-success my-sm-0 " href="dashboardbuyer.php" role="button"><?php echo $_SESSION['firstname']; ?></a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-outline-success my-sm-0 " href="dashboardseller.php" role="button"><?php echo $_SESSION['firstname']; ?></a>
                    <?php
                    }
                } else {
                    ?>
                    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#registerModal" type="submit">Registration</button>
                    &nbsp;
                    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#loginModal" type="submit">Login</button>
                    &nbsp;
            <?php
                }
            } ?>

        </div>
    </nav>





    <!--Register Modal -->

    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="firstname" class="form-control" placeholder="First name" required>
                            </div>
                            <div class="col">
                                <input type="text" name="lastname" class="form-control" placeholder="Last name" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile" required>
                            </div>
                            <div class="col">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="col">
                                <input type="password" name="repassword" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputCity"> &nbsp;City</label>
                                <input type="text" name="city" class="form-control" id="inputCity" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" name="state" class="form-control" required>
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
                                <input type="text" name="zip" class="form-control" id="inputZip" required>
                            </div>
                        </div>
                        <div class="form-row text-center">
                            <div class="col">
                                <input type="radio" name="role" id="gridRadios2" value="Buyer" required>
                                <label for="gridRadios2">
                                    Buyer
                                </label>
                            </div>
                            <div class="col">
                                <input type="radio" name="role" id="gridRadios1" value="Seller" required>
                                <label for="gridRadios1">
                                    Seller
                                </label>
                            </div>
                        </div>
                        <div class="form-row text-center">
                            <div class="col">
                                <button type="submit" name="done" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </div>

    <!--Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" name="ldone" class="btn btn-primary">Login</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <hr style="color: #E3F2FD;">

    <!-- ****************************************Slideshows*********************************** -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php
            $slidepq = "SELECT * FROM `slideshow`";
            $show = mysqli_query($con, $slidepq);
            $rowcount = mysqli_num_rows($show);

            for ($i = 1; $i <= $rowcount; $i++) {
                $row = mysqli_fetch_array($show);

                if ($i == 1) {
            ?>
                    <div class="carousel-item active">
                        <img src="<?php echo $row['image']; ?>" class="d-block w-100" height="700" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: black;"><?php echo $row['label']; ?></h5>
                            <p style="color: black;"><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="carousel-item">
                        <img src="<?php echo $row['image']; ?>" class="d-block w-100" height="700" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: black;"><?php echo $row['label']; ?></h5>
                            <p style="color: black;"><?php echo $row['description']; ?></p>
                        </div>
                    </div>
            <?php
                }
            }

            ?>




            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>

        <hr style="color: #E3F2FD;">

        <!-- ****************************************Contetnt*********************************** -->
        <div class="row row-cols-1 row-cols-md-5">

            <?php
            $con = mysqli_connect('localhost', 'root');
            mysqli_select_db($con, 'efarmsystem');
            if ($searchname) {
                $query = "SELECT * FROM `products` WHERE `productname` LIKE '%$searchname%';";
                $df = mysqli_query($con, $query);
                while ($res = mysqli_fetch_array($df)) {
            ?>
                    <div class="col mb-4" style="border-radius: 50px;">
                        <div class="card">
                            <img src="<?php echo $res['productimage']; ?>" class="card-img-top" height="350px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $res['productname'];  ?></h5>
                                <p class="card-text"><?php echo $res['productdiscription']; ?></p>
                                <h6 class="card-title" style="color: #EC1E23;">₹<?php echo $res['price'];  ?></h6>
                                <a href="psave.php?id=<?php echo $res['id']; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Wishlist</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                $query = "SELECT `id`, `email`, `mobile`, `productimage`, `productname`, `productdiscription`, `productcategory`, `price` FROM `products` ORDER BY id DESC";
                $df = mysqli_query($con, $query);
                while ($res = mysqli_fetch_array($df)) {
                ?>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="<?php echo $res['productimage']; ?>" class="card-img-top" height="350px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $res['productname'];  ?></h5>
                                <p class="card-text"><?php echo $res['productdiscription']; ?></p>
                                <h6 class="card-title" style="color: #EC1E23;">₹<?php echo $res['price'];  ?></h6>
                                <a href="psave.php?id=<?php echo $res['id']; ?>" class="btn btn-primary"><i class="fas fa-heart"></i> Add to Wishlist</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <?php

        if ($psave) {
            $psavequery = "SELECT * FROM `efarmsystem`.`products` WHERE id='$psave'";
            $psavedf = mysqli_query($con, $psavequery);
            ($psaveres = mysqli_fetch_array($psavedf));
            $_SESSION['id'] = $psaveres['id'];
            header('location:dashboardadmin.php');
        }
        echo $_SESSION['id'];
        ?>

        <!-- ****************************************Footer************************************* -->
        <hr style="color: #E3F2FD;">
        <hr style="color: #E3F2FD;">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="row">
                        <h2 class="card-title">E-Farm System</h2>
                    </div>
                    <div class="col">
                        <a href="#" style="color:#1878F3; font-size:25px; text-decoration:none;" class="fa fa-facebook"></a>
                        <a href="#" style="color:#1DA1F3; font-size:25px; text-decoration:none;" class="fa fa-twitter"></a>
                        <a href="#" style="color:#0274B6; font-size:25px; text-decoration:none;" class="fa fa-linkedin"></a>
                        <a href="#" style="color:#EC1E23; font-size:25px; text-decoration:none;" class="fa fa-youtube"></a>
                        <a href="#" style="color:#7039C3; font-size:25px; text-decoration:none;" class="fa fa-instagram"></a>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row">
                        <p class="card-text"><u style="color:#007BFF;">E-Farm</u> connects buyers and sellers(large and small) and exchanges information between<br> buyers and Seller.</p>
                    </div>
                    <div class="row">
                        <p class="card-text"><small class="text-muted">Thanks for Visiting.</small></p>
                    </div>
                </div>
                <div class="col-sm">
                    <ul class="list-group">
                        <li class="list-group-item" aria-current="true"> <a class="nav-link" href="index.php"><i class="fas fa-home"></i> &nbsp;Home</a>
                        <li class="list-group-item"><a class="nav-link" href="contact.php"><i class="fas fa-address-book"></i> &nbsp;Contact</a></li>
                        <li class="list-group-item"> <a class="nav-link" href="aboutus.php"><i class="fas fa-eject"></i> &nbsp;About Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr style="color: #E3F2FD;">

</body>

</html>