<?php
date_default_timezone_set("Asia/Jakarta");
include 'koneksi.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT kartu ,nama FROM tbguru ");
// $query = mysqli_fetch_assoc($result);
while ($row = mysqli_fetch_assoc($result)) {
    $kartu = $row['kartu'];
    $nama = $row['nama'];

    $jam_sekarang = date('Y-m-d H:i:s');
    $tgl_sekarang = date('Y-m-d');

    if ($kartu == $id) {


        echo $id;
        echo "<br>";
        echo $nama;
        
        $result2=mysqli_query($conn, "SELECT * FROM absen WHERE kartu = '$kartu' AND jam_pulang = '0000-00-00 00:00:00'");
        $count= mysqli_num_rows ( $result2 );

        if($count>0)
        {
            
            $up = mysqli_query($conn, "UPDATE absen SET jam_pulang='$jam_sekarang' WHERE kartu = '$kartu'");
            header("Location:home.php");
        }
        else
        {
            $add = "INSERT INTO absen VALUES  ('', '$kartu', '$nama', '$jam_sekarang', '')";
            mysqli_query($conn, $add);
            header("Location : home.php");

        }


        
    }
}
