<?php
session_start();
include 'koneksi.php';

// if (isset($_SESSION["login"])) {
//     header("Location: home.php");
//     exit();
// }
$tgl_sekarang = date('Y-m-d');

if (isset($_POST['login'])) {
    $user = $_POST['username'];

    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM tblogin WHERE 
				username = '$user'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row["password"])) {
            //set session

            $_SESSION["login"] = true;

            //cek remember me
           
            header("Location: home.php?filter=$tgl_sekarang");
            exit;
        }
    }
    $error = true;
}








?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <title>Silahkan Login</title>

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <!-- DataTables -->
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- form Uploads -->
    <link href="assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <style type="text/css">
        .wrapper-page .logo {
            font-size: 35px;
        }
    </style>

    <script src="assets/js/modernizr.min.js"></script>

</head>

<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="text-center">
            <img src="logo.png" style="max-width: 100px"><br><br>
            <a href="index.php" class="logo"><span>WEB ABSENSI SMK PBD </span></a>
        </div>
        <div class="m-t-10 card-box">
            <div class="text-center">
                <h4 class="text-uppercase font-bold m-b-0">Login</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal m-t-10" method="post">

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="username" type="text" required="" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="password" type="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-30">
                        <div class="col-xs-12">
                            <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit" name="login">L O G I N</button>
                        </div>
                    </div>



                </form>

            </div>
        </div>
        <!-- end card-box-->

        <div class="row">
            <div class="col-sm-12 text-center">
                <!-- <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p> -->
            </div>
        </div>

    </div>
    <!-- end wrapper page -->
    <?php include "script.php" ?>

</body>

</html>