<!DOCTYPE html>
<html>

<head>
    <?php
    date_default_timezone_set("Asia/Jakarta");
        session_start();
    include "head.php" ?>

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <?php
            $judul = "Data Guru";
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
    
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="active">
                                        <a href="#lihat" id="lihat-tab" role="tab" data-toggle="tab" aria-controls="lihat" aria-expanded="true"><i class="zmdi zmdi-search mdc-text-light-blue"></i> Data Guru</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tambah" role="tab" id="tambah-tab" data-toggle="tab" aria-controls="tambah"><i class="zmdi zmdi-plus"></i> Tambah Data</a>
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
                                                    <th>Alamat</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include "koneksi.php";
                                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                                $query = "SELECT * FROM tbguru ORDER BY id DESC";
                                                $row = mysqli_query($conn, $query);
                                                $i = 0;
                                                while ($rows = mysqli_fetch_array($row)) {

                                                    $i++;


                                                ?>

                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $rows['kartu']; ?></td>
                                                        <td><?= $rows['nama']; ?></td>
                                                        <td><?= $rows['alamat']; ?></td>
                                                        <td><?= $rows['ttl']; ?></td>
                                                        <td><?= $rows['kelamin']; ?></td>
                                                        <td>
                                                            <a href="hapus.php?id=<?php echo $rows['id']; ?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 btn-xs alert_notif" > <i class="fa fa-remove"></i> </a>
                                                            <a href="#edit=<?= $rows['id']; ?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 btn-xs" data-toggle="modal" data-target="#edit"> <i class="fa fa-pencil-square"></i> </a>
                                                        </td>

                                                    </tr>


                                                    <!-- Button trigger modal -->
                                                    <!-- <button type="button" class="btn btn-primary" data-toggle="edit" data-target="#edit">
                                                    Launch demo modal
                                                    </button> -->

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editLabel">Update Data</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" enctype="multipart/form-data" action="edit.php" data-parsley-validate novalidate style="width: 300px;">

                                                                        <div class="form-group">

                                                                            <input type="hidden" name="id" value="<?= $rows['id']; ?>" parsley-trigger="change" required placeholder="Masukkan Kartu" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="kartu">Kartu</label>
                                                                            <input type="text" name="kartu" value="<?= $rows['kartu']; ?>" parsley-trigger="change" required placeholder="Masukkan Kartu" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nama">Nama</label>
                                                                            <input type="text" name="nama" value="<?= $rows['nama']; ?>" parsley-trigger="change" required placeholder="Masukkan Nama" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="alamat">Alamat</label>
                                                                            <input type="text" name="alamat" value="<?= $rows['alamat']; ?>" parsley-trigger="change" required placeholder="Masukkan Alamat" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="tanggal">Tanggal Lahir</label>
                                                                            <input type="date" name="ttl" value="<?= $rows['ttl']; ?>" parsley-trigger="change" required placeholder="Masukkan Alamat" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">

                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                                                                                </div>
                                                                                <select name="kelamin" class="custom-select" id="inputGroupSelect01">
                                                                                    <option selected><?= $rows['kelamin']; ?></option>
                                                                                    <option value="Pria">Pria</option>
                                                                                    <option value="Wanita">Wanita</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>



                                                                        <div class="form-group text-right m-b-0">
                                                                            <button type="reset" class="btn btn-default waves-effect waves-light ">
                                                                                Reset
                                                                            </button>
                                                                            <button class="btn btn-primary waves-effect waves-light m-l-5" onclick="submit()" type="submit" name="submit">
                                                                                Update
                                                                            </button>

                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php

                                                }
                                                    ?>


                                            </tbody>
                                        </table>

                                        <!-- end row -->
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tambah" aria-labelledby="tambah-tab">

                                        


                                        

                                        <form method="post" enctype="multipart/form-data" action="tambah.php" data-parsley-validate novalidate style="width: 300px;">
                                            <div class="form-group">
                                                <label for="kartu">Kartu</label>
                                                <input type="text" name="kartu" parsley-trigger="change" required placeholder="Masukkan Kartu" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" parsley-trigger="change" required placeholder="Masukkan Nama" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat" parsley-trigger="change" required placeholder="Masukkan Alamat" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal Lahir</label>
                                                <input type="date" name="tanggal" parsley-trigger="change" required placeholder="Masukkan Alamat" class="form-control">
                                            </div>
                                            <div class="form-group">

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
                                                    </div>
                                                    <select name="kelamin" class="custom-select" id="inputGroupSelect01">
                                                        <option selected>Choose...</option>
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>

                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group text-right m-b-0">
                                                <button type="reset" class="btn btn-default waves-effect waves-light ">
                                                    Reset
                                                </button>
                                                <button class="btn btn-primary waves-effect waves-light m-l-5" type="submit" name="submit">
                                                    Tambah
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- END wrapper -->

    
    
  <?php
  include "swal.php";
  ?>




    <?php include "script.php" ?>
    <script src="swal.js"></script>


</body>

</html>