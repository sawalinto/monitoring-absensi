<?php 
$kd = $_GET['id'];

// include autoloader
// require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
// use Dompdf\Dompdf;
// instantiate and use the dompdf class
// $dompdf = new Dompdf();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Invoice</title>
        <?php include "head.php" ?>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

               <?php
                $judul = "Data Orders";
                $judul2 = "";
                // include "topbar.php"; 
                ?>
            </div>
            <!-- Top Bar End -->



            <!-- ========== Left Sidebar Start ========== -->
            <!-- <div class="left side-menu"> -->
                <?php 
                // include "sidemenu.php"; 
                ?>

            <!-- </div> -->
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
             <div class="">
                <!-- Start content -->
                <div class="">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
<?php
include "koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$query="SELECT * from tblogin";      
//menjalankan query      
if (mysql_query($query)) {      

$result=mysql_query($query);     
} else die ("Error menjalankan query". mysql_error());      
  
if (mysql_num_rows($result) > 0)     
{         
   while($row = mysql_fetch_array($result)) {      
$i++;
?>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong><?php echo $row['nama_customer'] ?></strong><br>
                                                      <?php echo $row['email'] ?><br>
                                                      <?php echo $row['alamat'] ?>, <?php echo $row['kota'] ?> <?php echo $row['pos'] ?><br>
                                                      <?php echo $row['telp'] ?>
                                                      </address>
                                                      <p><strong>Tanggal Order: </strong><?php echo $row['tgl_order'] ?></p>
                                                    <p class="m-t-10"><strong>Status Order: </strong><?php echo $row['status'] ?></p>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                <img src="sumomarketbarcodeqr.png">
                                                <p align="center"><strong><?php echo $row['kode_voucher'] ?></strong></p>
                                                    
                                                    <!-- <p class="m-t-10"><strong>Order ID: </strong> #123456</p> -->
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- <div class="m-h-50"></div> -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Produk</th>
                                                            <th>QTY</th>
                                                            <th>Harga Diskon</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td><?php echo $row['nama_produk'] ?></td>
                                                                <td><?php echo $row['qty'] ?></td>
                                                                <td><?php echo $row['harga_diskon'] ?></td>
                                                                <td><?php echo $row['total_bayar'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="clearfix m-t-40">
                                                    <!-- <h5 class="small text-inverse font-600">PAYMENT TERMS AND POLICIES</h5> -->

                                                    <small>
                                                        Voucher ini tidak untuk diperjualbelikan di luar sumomarket.co.id<br>
                                                        Apabila anda membeli voucher ini dari pihak lain maka sumomarket.co.id tidak bertanggung jawab atas keasliannya.
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-3">
                                                <p class="text-right"><b>Sub-total:</b>Rp. <?php echo $row['total_bayar'] ?></p>
                                                <p class="text-right">Pajak : Rp. 0</p>
                                                <hr>
                                                <h3 class="text-right">Rp. <?php echo $row['total_bayar'] ?></h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php 
}
}
?>
                            </div>

                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                
            </div>
        </div>

        <!-- END wrapper -->
<?php include "script.php" ?>

    </body>
</html>
<?php
// $dompdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>');

// (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
// $dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream();""
?>