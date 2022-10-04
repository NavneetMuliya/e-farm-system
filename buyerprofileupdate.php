<?php
include 'link.php';
include 'conn.php';

session_start();

$em = $_SESSION['email'];
$q = "SELECT * FROM `efarmsystem`.`users` WHERE email='$em' ";
$query = mysqli_query($con, $q);
($res = mysqli_fetch_array($query));

if (isset($_POST['bproupdate'])) {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $zip = mysqli_real_escape_string($con, $_POST['zip']);

    $emailquery = "select * from efarmsystem.users where email='$em' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount < 1) {

?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Your Email already exist!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php
    } else {
        if ($pass_decode) {
            $updatequery = "UPDATE `efarmsystem`.`users` SET `firstname`='$firstname',`lastname`=' $lastname',`mobile`=' $mobile',`email`=' $email',`password`='$npass',`repassword`='$npass',`city`='$city',`state`='$state',`zip`='$zip' WHERE email='$emailsf'";
            $iquery = mysqli_query($con, $updatequery);
            if ($iquery) {
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Update Successful
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                header('location:dashboardbuyer.php');
            } else {

            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Not Update data!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Password is not same! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<?php
        }
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

        .bholu {
            margin-top: 100px;
            border: 1px solid #CED4DA;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col bholu">
                <br>
                <form method="POST">

                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="firstname" value="<?php echo $res['firstname']; ?>" class="form-control">
                        </div>
                        <div class="col">
                            <input type="text" name="lastname" value="<?php echo $res['lastname']; ?>" class="form-control" placeholder="">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="mobile" value="<?php echo $res['mobile']; ?>" class="form-control" placeholder="">
                        </div>
                        <div class="col">
                            <input type="email" name="email" value="<?php echo $res['email']; ?>" class="form-control">
                        </div>
                    </div>
                    <br>


                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="inputCity"> &nbsp;City</label>
                            <input type="text" name="city" class="form-control" placeholder="<?php echo $res['city']; ?>" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State :<small> <?php echo $res['state']; ?></small></label>
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
                            <input type="text" name="zip" placeholder="<?php echo $res['zip']; ?>" class="form-control" id="inputZip">
                        </div>
                    </div>

                    <div class="form-row text-center">
                        <div class="col">
                            <button type="submit" name="bproupdate" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">

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