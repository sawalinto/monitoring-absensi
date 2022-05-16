<!DOCTYPE html>
<html>

<head>
    <?php
    date_default_timezone_set("Asia/Jakarta");

    // if (!isset($_SESSION["login"])){
    // 	header("Location: index.php");
    // 	exit;
    // }
    include "head.php" ?>
</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <?php
            $judul = "Monitoring";
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


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="dropdown pull-right">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="zmdi zmdi-more-vert "></i>
                                    </a>
                                </div>

                                <div class="row">

                                    <?php
                                    $filter = $_GET['filter'];
                                    $cek = mysqli_query($conn, "SELECT * FROM absen WHERE DATE(jam_masuk) = '$filter'");
                                    ?>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <form action="" method="get">
                                                <label for="tanggal" style="display: block;">Filter Tanggal</label>
                                                <input type="date" name="filter" value="<?= $_GET['filter']; ?>" parsley-trigger="change" required placeholder="Masukkan Alamat" class="form-control" style="display: inline-block ; width:200px">
                                                <button class="btn btn-primary" type="submit">Filter</button>
                                            </form>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li role="presentation" class="active">
                                                <a href="#lihat" id="lihat-tab" role="tab" data-toggle="tab" aria-controls="lihat" aria-expanded="true"><i class="zmdi zmdi-search mdc-text-light-blue"></i> Monitoring Absensi</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="lihat" aria-labelledby="lihat-tab">


                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kartu</th>
                                                            <th>Nama</th>
                                                            <th>Jam Masuk</th>
                                                            <th>Jam Pulang</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>



                                                        <?php
                                                        include "koneksi.php";
                                                        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

                                                        $query = "SELECT * FROM absen  WHERE DATE(jam_masuk) = '$filter'";
                                                        // $jam_pulang = $rows['jam_masuk'];
                                                        // $jam_masuk = $rows['jam_pulang'];
                                                        $row = mysqli_query($conn, $query);
                                                        $i = 0;
                                                        while ($rows = mysqli_fetch_array($row)) {

                                                            $i++;

                                                        ?>

                                                            <?php


                                                            $cekquery = mysqli_query($conn, "SELECT * FROM jamabsen");
                                                            $time = mysqli_fetch_array($cekquery);

                                                            $batas_absen = date('H:i:s', strtotime($time['jam_masuk']));
                                                            $absen_pulang = date('H:i:s', strtotime($time['jam_pulang']));

                                                            $mulai_absen = "00:00:00";
                                                            

                                                            $jam_masuk = date('H:i:s', strtotime($rows['jam_masuk']));
                                                            $jam_pulang = date('H:i:s', strtotime($rows['jam_pulang']));


                                                            if ($jam_masuk >= $batas_absen) {

                                                                $status = "Terlambat";
                                                            } elseif ($jam_masuk <= $batas_absen && $jam_pulang == $mulai_absen) {
                                                                $status = "Belum Absen Pulang";
                                                            } else {
                                                                $status = 'Hadir';
                                                            }
                                                            ?>

                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $rows['kartu']; ?></td>
                                                                <td><?php echo $rows['nama']; ?></td>
                                                                <td><?php echo $rows['jam_masuk']; ?></td>
                                                                <td><?php echo $rows['jam_pulang']; ?></td>
                                                                <td><?php echo $status; ?></td>


                                                            </tr>




                                                        <?php
                                                        }
                                                        ?>






                                                    </tbody>
                                                </table>

                                                <!-- end row -->
                                            </div>

                                        </div>
                                    </div><!-- end col -->

                                </div>
                                <!-- end row -->

                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                    <!-- End row -->


                    <!-- end row -->
                    <!-- End row -->

                </div> <!-- container -->

            </div> <!-- content -->

        </div>
        <!-- End content-page -->



        <?php include "script.php" ?>

</body>

</html>