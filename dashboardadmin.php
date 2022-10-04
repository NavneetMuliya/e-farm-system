<?php
include 'link.php';
include 'conn.php';
session_start();
error_reporting(0);
$wcq = "SELECT COUNT(*) as id FROM `users`";
$wcq2 = mysqli_query($con, $wcq);
$wqe = mysqli_fetch_assoc($wcq2);

$total = "SELECT count(*) as id FROM `products` ";
$total2 = mysqli_query($con, $total);
$toto = mysqli_fetch_assoc($total2);

$slide = "SELECT count(*) as id FROM `slideshow` ";
$slide2 = mysqli_query($con, $slide);
$sli = mysqli_fetch_assoc($slide2);

$feedbackn = "SELECT count(*) as id FROM `feedbacks` ";
$feedbackn2 = mysqli_query($con, $feedbackn);
$feedbacknans = mysqli_fetch_assoc($feedbackn2);
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
        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-user"></i> &nbsp;Admin</button>
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
                            <a class="nav-link active" href="#user">
                                <i class="fas fa-user"></i> &nbsp;
                                Users
                                <span class="badge badge-pill badge-primary" style="font-weight: bold;"><?php echo $wqe['id']; ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#products">
                                <i class="fab fa-product-hunt"></i> &nbsp;
                                Products
                                <span class="badge badge-pill badge-primary" style="font-weight: bold;"><?php echo $toto['id']; ?></span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feedback">
                                <i class="fas fa-comment-alt"></i> &nbsp;
                                Feedback
                                <span class="badge badge-pill badge-primary" style="font-weight: bold;"><?php echo $feedbacknans['id']; ?></span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" data-toggle="modal" data-target="#slideModal">
                                <i class="fab fa-slideshare"></i> &nbsp;
                                Add Slide
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#slide">
                                <i class="fab fa-slideshare"></i> &nbsp;
                                Slide Details
                                <span class="badge badge-pill badge-primary" style="font-weight: bold;"><?php echo $sli['id']; ?></span>

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

                    </ul>
                </div>
            </nav>
            <!-- Slide Modal -->
            <?php
            if (isset($_POST['slidedone'])) {
                $slideimage = $_FILES['slideimage'];
                $slidelable = $_POST['slidelable'];
                $slidedisc = $_POST['slidedisc'];
                $image_loc = $_FILES['slideimage']['tmp_name'];
                $image_name = $_FILES['slideimage']['name'];
                $img_des = "images/" . $image_name;
                move_uploaded_file($image_loc, "images/" . $image_name);

                $slideq = "INSERT INTO `slideshow`(`label`, `description`, `image`) VALUES ('$slidelable','$slidedisc','$img_des')";
                mysqli_query($con, $slideq);
                header('location:dashboardadmin.php');
            }

            ?>

            <div class="modal fade" id="slideModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Slide</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" name="slideimage" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="slidelable" type="text" placeholder="Slide Lable">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Slide Discription</label>
                                    <textarea class="form-control" name="slidedisc" rows="5" id="comment"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="slidedone" class="btn btn-primary">Save</button>&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                <div data-spy="scroll" data-offset="0">

                    <div id="user">
                        <hr style="color: #E3F2FD;">
                        <div class="text-center" style="color: #007BFF; font-weight:bold; "><i class="fas fa-user"></i> &nbsp;User Details</div>
                        <hr style="color: #E3F2FD;">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Firstname</th>
                                    <th scope="col">Lastname</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">City</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Zip</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <?php
                            $userq = "SELECT * FROM `users` ";
                            $userqy = mysqli_query($con, $userq);
                            while ($userqt = mysqli_fetch_array($userqy)) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $userqt['id']; ?></td>
                                    <td><?php echo $userqt['firstname']; ?></td>
                                    <td><?php echo $userqt['lastname']; ?></td>
                                    <td><?php echo $userqt['mobile']; ?></td>
                                    <td><?php echo $userqt['email']; ?></td>
                                    <td><?php echo $userqt['city']; ?></td>
                                    <td><?php echo $userqt['state']; ?></td>
                                    <td><?php echo $userqt['zip']; ?></td>
                                    <td><?php echo $userqt['role']; ?></td>
                                    <td><a class="btn btn-outline-danger" href="udelete.php?id=<?php echo $userqt['id']; ?>" role="button">Delete</a></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>

                    <div id="products">
                        <hr style="color: #E3F2FD;">
                        <div class="text-center" style="color: #007BFF; font-weight:bold; "> <i class="fab fa-product-hunt"></i> &nbsp;Products Details</div>
                        <hr style="color: #E3F2FD;">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Discription</th>
                                    <th scope="col">Product Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <?php
                            $productsq = "SELECT * FROM `products` ";
                            $productsqy = mysqli_query($con, $productsq);
                            while ($productsqt = mysqli_fetch_array($productsqy)) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $productsqt['id']; ?></td>
                                    <td><?php echo $productsqt['email']; ?></td>
                                    <td><?php echo $productsqt['mobile']; ?></td>
                                    <td><img src="<?php echo $productsqt['productimage']; ?>" width="100px" height="100px" alt=""> </td>
                                    <td><?php echo $productsqt['productname']; ?></td>
                                    <td><?php echo $productsqt['productdiscription']; ?></td>
                                    <td><?php echo $productsqt['productcategory']; ?></td>
                                    <td>₹<?php echo $productsqt['price']; ?></td>
                                    <td><a class="btn btn-outline-danger" href="apdelete.php?id=<?php echo $productsqt['id']; ?>" role="button">Delete</a></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>

                    <div id="feedback">
                        <hr style="color: #E3F2FD;">
                        <div class="text-center" style="color: #007BFF; font-weight:bold; "> <i class="fas fa-comment-alt"></i> &nbsp;Feedback Details</div>
                        <hr style="color: #E3F2FD;">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Feedback</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <?php
                            $feedb = "SELECT * FROM `feedbacks` ";
                            $feedby = mysqli_query($con, $feedb);
                            while ($feedbt = mysqli_fetch_array($feedby)) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $feedbt['id']; ?></td>
                                    <td><?php echo $feedbt['mobile']; ?></td>
                                    <td><?php echo $feedbt['email']; ?></td>
                                    <td><?php echo $feedbt['feedback']; ?></td>
                                    <td><?php echo $feedbt['role']; ?></td>
                                    <td><a class="btn btn-outline-danger" href="fdelete.php?id=<?php echo $feedbt['id']; ?>" role="button">Delete</a></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>

                    <div id="slide">
                        <hr style="color: #E3F2FD;">
                        <div class="text-center" style="color: #007BFF; font-weight:bold; "> <i class="fab fa-slideshare"></i> &nbsp;
                            Slideshows Details
                        </div>
                        <hr style="color: #E3F2FD;">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Slide Image</th>
                                    <th scope="col">Slide Label</th>
                                    <th scope="col">Slide Description</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <?php
                            $slidepq = "SELECT * FROM `slideshow`";
                            $slidepqy = mysqli_query($con, $slidepq);
                            while ($slidepqt = mysqli_fetch_array($slidepqy)) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $slidepqt['id']; ?></td>
                                    <td> <img src="<?php echo $slidepqt['image']; ?>" width="200" height="200" alt=""> </td>
                                    <td><?php echo $slidepqt['label']; ?></td>
                                    <td><?php echo $slidepqt['description']; ?></td>

                                    <td><a class="btn btn-outline-danger" href="sdelete.php?id=<?php echo $slidepqt['id']; ?>" role="button">Delete</a></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>