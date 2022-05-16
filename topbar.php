<?php
include "koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div class="topbar-left m-b-">
    <img src="logo.png" alt="" width="80" height="80">
    <h4 href="home.php">Selamat Datang, <br><b></b></h4>
    <p>Anda Login Sebagai <b>Admin</b></p>
    <hr>
</div>



<!-- Button mobile view to collapse sidebar menu -->
<div class="navbar navbar-default" role="navigation">
    <div class="container">

        <!-- Page title -->
        <ul class="nav navbar-nav navbar-left">
            <li>
                <button class="button-menu-mobile open-left">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>
            <li>
                <h4 class="page-title"><?php echo $judul ?></h4>
            </li>
        </ul>


    </div><!-- end container -->
</div><!-- end navbar -->