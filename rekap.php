<!DOCTYPE html>
<html>

<head>
    <?php
    date_default_timezone_set("Asia/Jakarta");
    include "head.php" ?>

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <?php
            $judul = "Rekap Absensi";
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

                                <?php
                                $bulan = date("m-Y");
                                ?>

                                <form method="GET" class="form-inline" action="" style="margin-bottom: 20px;">
                                    


                                    <select name='tahun' id='tahun' class='form-control'>
                                        <?php $mulai = date('Y') - 2;
                                        for ($i = $mulai; $i < $mulai + 100; $i++) {
                                        ?>
                                            <option value='<?php echo $i; ?>' <?php if ($i == $tahun) {
                                                                                    echo " selected";
                                                                                } ?>><?php echo $i; ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>



                                    <select name='bulan' id='bulan' class='form-control'>
                                        <option value='01' <?php if ($bulan == "01") {
                                                                echo " selected";
                                                            } ?>>Januari</option>
                                        <option value='02' <?php if ($bulan == "02") {
                                                                echo " selected";
                                                            } ?>>Februari</option>
                                        <option value='03' <?php if ($bulan == "03") {
                                                                echo " selected";
                                                            } ?>>Maret</option>
                                        <option value='04' <?php if ($bulan == "04") {
                                                                echo " selected";
                                                            } ?>>April</option>
                                        <option value='05' <?php if ($bulan == "05") {
                                                                echo " selected";
                                                            } ?>>Mei</option>
                                        <option value='06' <?php if ($bulan == "06") {
                                                                echo " selected";
                                                            } ?>>Juni</option>
                                        <option value='07' <?php if ($bulan == "07") {
                                                                echo " selected";
                                                            } ?>>Juli</option>
                                        <option value='08' <?php if ($bulan == "08") {
                                                                echo " selected";
                                                            } ?>>Agustus</option>
                                        <option value='09' <?php if ($bulan == "09") {
                                                                echo " selected";
                                                            } ?>>September</option>
                                        <option value='10' <?php if ($bulan == "10") {
                                                                echo " selected";
                                                            } ?>>Oktober</option>
                                        <option value='11' <?php if ($bulan == "11") {
                                                                echo " selected";
                                                            } ?>>November</option>
                                        <option value='12' <?php if ($bulan == "12") {
                                                                echo " selected";
                                                            } ?>>Desember</option>
                                    </select>

                                    <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button>
                                </form>


                                <table id="exampleo" class="table table-striped table-bordered display nowrap mt-5" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kartu</th>
                                            <th>Nama</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>6</th>
                                            <th>7</th>
                                            <th>8</th>
                                            <th>9</th>
                                            <th>10</th>
                                            <th>11</th>
                                            <th>12</th>
                                            <th>13</th>
                                            <th>14</th>
                                            <th>15</th>
                                            <th>16</th>
                                            <th>17</th>
                                            <th>18</th>
                                            <th>19</th>
                                            <th>20</th>
                                            <th>21</th>
                                            <th>22</th>
                                            <th>23</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                            <th>28</th>
                                            <th>29</th>
                                            <th>30</th>
                                            <th>31</th>



                                        </tr>
                                    </thead>
                                    <?php

                                    $bulan = $_GET['bulan'];
                                    $tahun = $_GET['tahun'];

                                    







                                    ?>
                                    
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $query = mysqli_query($conn, "SELECT kartu, nama FROM tbguru");
                                        while ($fetch = mysqli_fetch_array($query)) {

                                            $id = $fetch['id'];
                                            $kartu = $fetch['kartu'];


                                            $a1 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu' AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 1");
                                            if ($a1 = mysqli_fetch_array($a1)) {
                                                $a1 = $a1['keterangan'];
                                            } else {
                                                $a1 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }

                                            $a2 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 2");
                                            if ($a2 = mysqli_fetch_array($a2)) {
                                                $a2 = $a2['keterangan'];
                                            } else {
                                                $a2 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a3 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 3");
                                            if ($a3 = mysqli_fetch_array($a3)) {
                                                $a3 = $a3['keterangan'];
                                            } else {
                                                $a3 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a4 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 4");
                                            if ($a4 = mysqli_fetch_array($a4)) {
                                                $a4 = $a4['keterangan'];
                                            } else {
                                                $a4 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a5 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 5");
                                            if ($a5 = mysqli_fetch_array($a5)) {
                                                $a5 = $a5['keterangan'];
                                            } else {
                                                $a5 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a6 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 6");
                                            if ($a6 = mysqli_fetch_array($a6)) {
                                                $a6 = $a6['keterangan'];
                                            } else {
                                                $a6 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a7 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 7");
                                            if ($a7 = mysqli_fetch_array($a7)) {
                                                $a7 = $a7['keterangan'];
                                            } else {
                                                $a7 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a8 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 8");
                                            if ($a8 = mysqli_fetch_array($a8)) {
                                                $a8 = $a8['keterangan'];
                                            } else {
                                                $a8 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a9 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 9");
                                            if ($a9 = mysqli_fetch_array($a9)) {
                                                $a9 = $a9['keterangan'];
                                            } else {
                                                $a9 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a10 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 10");
                                            if ($a10 = mysqli_fetch_array($a10)) {
                                                $a10 = $a10['keterangan'];
                                            } else {
                                                $a10 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a11 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 11");
                                            if ($a11 = mysqli_fetch_array($a11)) {
                                                $a11 = $a11['keterangan'];
                                            } else {
                                                $a11 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a12 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 12");
                                            if ($a12 = mysqli_fetch_array($a12)) {
                                                $a12 = $a12['keterangan'];
                                            } else {
                                                $a12 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a13 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 13");
                                            if ($a13 = mysqli_fetch_array($a13)) {
                                                $a13 = $a13['keterangan'];
                                            } else {
                                                $a13 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a14 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 14");
                                            if ($a14 = mysqli_fetch_array($a14)) {
                                                $a14 = $a14['keterangan'];
                                            } else {
                                                $a14 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a15 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 15");
                                            if ($a15 = mysqli_fetch_array($a15)) {
                                                $a15 = $a15['keterangan'];
                                            } else {
                                                $a15 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a16 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 16");
                                            if ($a16 = mysqli_fetch_array($a16)) {
                                                $a16 = $a16['keterangan'];
                                            } else {
                                                $a16 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a17 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 17");
                                            if ($a17 = mysqli_fetch_array($a17)) {
                                                $a17 = $a17['keterangan'];
                                            } else {
                                                $a17 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a18 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 18");
                                            if ($a18 = mysqli_fetch_array($a18)) {
                                                $a18 = $a18['keterangan'];
                                            } else {
                                                $a18 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                                
                                            }
                                            $a19 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 19");
                                            if ($a19 = mysqli_fetch_array($a19)) {
                                                $a19 = $a19['keterangan'];
                                            } else {
                                                $a19 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a20 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 20");
                                            if ($a20 = mysqli_fetch_array($a20)) {
                                                $a20 = $a20['keterangan'];
                                            } else {
                                                $a20 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a21 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 21");
                                            if ($a21 = mysqli_fetch_array($a21)) {
                                                $a21 = $a21['keterangan'];
                                            } else {
                                                $a21 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a22 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 22");
                                            if ($a22 = mysqli_fetch_array($a22)) {
                                                $a22 = $a22['keterangan'];
                                            } else {
                                                $a22 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a23 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 23");
                                            if ($a23 = mysqli_fetch_array($a23)) {
                                                $a23 = $a23['keterangan'];
                                            } else {
                                                $a23 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a24 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 24");
                                            if ($a24 = mysqli_fetch_array($a24)) {
                                                $a24 = $a24['keterangan'];
                                            } else {
                                                $a24 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a25 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 25");
                                            if ($a25 = mysqli_fetch_array($a25)) {
                                                $a25 = $a25['keterangan'];
                                            } else {
                                                $a25 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a26 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 26");
                                            if ($a26 = mysqli_fetch_array($a26)) {
                                                $a26 = $a26['keterangan'];
                                            } else {
                                                $a26 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a27 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 27");
                                            if ($a27 = mysqli_fetch_array($a27)) {
                                                $a27 = $a27['keterangan'];
                                            } else {
                                                $a27 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a28 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 28");
                                            if ($a28 = mysqli_fetch_array($a28)) {
                                                $a28 = $a28['keterangan'];
                                            } else {
                                                $a28 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a29 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 29");
                                            if ($a29 = mysqli_fetch_array($a29)) {
                                                $a29 = $a29['keterangan'];
                                            } else {
                                                $a29 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a30 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 30");
                                            if ($a30 = mysqli_fetch_array($a30)) {
                                                $a30 = $a30['keterangan'];
                                            } else {
                                                $a30 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }
                                            $a31 = mysqli_query($conn, "SELECT keterangan FROM absen WHERE kartu = '$kartu'  AND  YEAR(jam_masuk) = $tahun AND MONTH(jam_masuk) = $bulan AND day(jam_masuk) = 31");
                                            if ($a31 = mysqli_fetch_array($a31)) {
                                                $a31 = $a31['keterangan'];
                                            } else {
                                                $a31 = '<i class="fa fa-close" style="color: red;" aria-hidden="true"></i>';
                                            }






                                        ?>


                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo  $kartu; ?></td>
                                                <td><?php echo $fetch['nama']; ?></td>
                                                <td><?= $a1; ?></td>
                                                <td><?= $a2; ?></td>
                                                <td><?= $a3; ?></td>
                                                <td><?= $a4; ?></td>
                                                <td><?= $a5; ?></td>
                                                <td><?= $a6; ?></td>
                                                <td><?= $a7; ?></td>
                                                <td><?= $a8; ?></td>
                                                <td><?= $a9; ?></td>
                                                <td><?= $a10; ?></td>
                                                <td><?= $a11; ?></td>
                                                <td><?= $a12; ?></td>
                                                <td><?= $a13; ?></td>
                                                <td><?= $a14; ?></td>
                                                <td><?= $a15; ?></td>
                                                <td><?= $a16; ?></td>
                                                <td><?= $a17; ?></td>
                                                <td><?= $a18; ?></td>
                                                <td><?= $a19; ?></td>
                                                <td><?= $a20; ?></td>
                                                <td><?= $a21; ?></td>
                                                <td><?= $a22; ?></td>
                                                <td><?= $a23; ?></td>
                                                <td><?= $a24; ?></td>
                                                <td><?= $a25; ?></td>
                                                <td><?= $a26; ?></td>
                                                <td><?= $a27; ?></td>
                                                <td><?= $a28; ?></td>
                                                <td><?= $a29; ?></td>
                                                <td><?= $a30; ?></td>
                                                <td><?= $a31; ?></td>



                                            </tr>


                                        <?php
                                        }
                                        ?>




                                        <?php include 'filter.php' ?>
                                    </tbody>
                                </table>








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
    include "footer.php";
    include "script.php";
    ?>
    <script>
        $(document).ready(function() {
            $('#exampleo').dataTable({
                // "scrollY": f,
                "scrollX": true
            });
        });
    </script>

</body>

</html>