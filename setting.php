<!DOCTYPE html>
<html>

<head>
    <?php
    date_default_timezone_set("Asia/Jakarta");
    session_start();
    include "koneksi.php";
    include "head.php"; ?>

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <?php
            $judul = "Setting";
            $judul2 = "";
            include "topbar.php" ?>
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <?php include "sidemenu.php" ?>

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="card-box">
                        <div class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert "></i>
                            </a>
                        </div>

                        <div class="row">

                            <div class="col-lg-12">



                                <h4>Setting Jam Absen</h4>
                                <form method="post" enctype="multipart/form-data" action="editjam.php" data-parsley-validate novalidate style="width: 300px;">
                                    <?php
                                    $time = mysqli_query($conn, "SELECT * FROM jamabsen LIMIT 1");
                                    $times = mysqli_fetch_array($time);

                                    ?>
                                    <input type="hidden" name="id" value="<?= $times['id']; ?>" parsley-trigger="change" class="form-control">
                                    <div class="form-group">
                                        <label for="kartu">Jam Masuk</label>
                                        <input type="time" name="masuk" value="<?= $times['jam_masuk']; ?>" parsley-trigger="change" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Jam Pulang</label>
                                        <input type="time" name="pulang" value="<?= $times['jam_pulang']; ?>" parsley-trigger="change" class="form-control">
                                    </div>


                                    <div class="form-group text-right m-b-0">

                                        <button class="btn btn-primary waves-effect waves-light m-l-5" onclick="submit()" type="submit" name="submit">
                                            Update
                                        </button>

                                    </div>


                                </form>
                                



                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                    </div>
                </div><!-- end col -->
            </div>


        </div> <!-- container -->

    </div> <!-- content -->

    </div>
    <!-- End content-page -->



    </div>
    <!-- END wrapper -->


    <?php
    include 'footer.php';
    include "swal.php";
    ?>
    
    <?php
        
    include "script.php" ?>



</body>

</html>