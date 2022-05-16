<div class="sidebar-inner slimscrollleft">
    <?php
    $tgl_sekarang = date('Y-m-d');
    ?>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu" style="padding-top: 50px; margin-top:50px;">
                        <ul>
                            <li class="text-muted menu-title">Menu</li>

                            <li>
                                <a href="home.php?filter=<?= $tgl_sekarang ;?>" <?php echo ($judul == "Monitoring") ? "class='waves-effect active'" : ""; ?>><i class="zmdi zmdi-view-dashboard"></i> <span> Beranda</span> </a>
                            </li>
                            <li>
                                <a href="data-guru.php" <?php echo ($judul == "Data Guru") ? "class='waves-effect active'": ""; ?>><i class="zmdi zmdi-accounts"></i> <span> Berkas Guru</span> </a>
                            </li>
                            <li>
                                <a href="rekap.php?tahun=<?= date('Y') ;?>&bulan=<?= date('m') ;?>" <?php echo ($judul == "Rekap Absensi") ? "class='waves-effect active'": ""; ?>><i class="zmdi zmdi-time-restore"></i> <span> Rekap Absensi</span> </a>
                            </li>
                            <li>
                                <a href="setting.php" <?php echo ($judul == "Setting") ? "class='waves-effect active'": ""; ?>><i class="zmdi zmdi-accounts-list"></i> <span>Setting </span> </a>
                            </li>
                            
                           

                            <li>
                                <a href="logout.php"><i class="zmdi zmdi-power"></i> <span> Logout </span> </a>
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>