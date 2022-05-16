<?php
date_default_timezone_set("Asia/Jakarta");
include 'koneksi.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tbguru WHERE kartu = '$id' ");
// $query = mysqli_fetch_assoc($result);
$row = mysqli_num_rows($result);
if ($row > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        // $time = mysqli_query($conn, "SELECT * FROM jamabsen LIMIT 1");
        // $times = mysqli_fetch_array($time);
        



        $kartu = $row['kartu'];
        $nama = $row['nama'];


        // $cek_jam= new DateTime('now');
        $cek_jam= date('Y-m-d H:i:s');
        $jam_sekarang = strlen($cek_jam);
        $tgl_sekarang = date('Y-m-d');


        $cekquery = mysqli_query($conn, "SELECT * FROM jamabsen");
        $rows = mysqli_fetch_array($cekquery);

        $absen_masuk = date('H:i:s', strtotime($rows['jam_masuk']));
        $absen_pulang = date('H:i:s', strtotime($rows['jam_pulang']));
        $mulai_absen = "00:00:00";
  




        echo $nama;

        $cek = mysqli_query($conn, "SELECT * FROM absen WHERE kartu = '$kartu' AND DATE(jam_masuk) = '$tgl_sekarang' AND DATE(jam_pulang) = '$tgl_sekarang'");
        $count2 = mysqli_num_rows($cek);
        if ($count2 > 0) {
            header("Location: home.php?filter=$tgl_sekarang");
        }


        $result2 = mysqli_query($conn, "SELECT * FROM absen WHERE kartu = '$kartu' AND DATE(jam_masuk) = '$tgl_sekarang' AND jam_pulang = '0000-00-00 00:00:00'");
        $count = mysqli_num_rows($result2);
        $status = $count['keterangan'];

        if ($count > 0) {

            if ($jam_sekarang >= $absen_pulang && $status == "T") {
                $status = "";
                $up = mysqli_query($conn, "UPDATE absen SET jam_pulang='$jam_sekarang', keterangan = '$status' WHERE kartu = '$kartu'");
                header("Location: home.php?filter=$tgl_sekarang");
            }
            if ($jam_sekarang >= $absen_pulang && $status == "BAP") {
                $status = "H";
                $up = mysqli_query($conn, "UPDATE absen SET jam_pulang='$jam_sekarang', keterangan = '$status' WHERE kartu = '$kartu'");
                header("Location: home.php?filter=$tgl_sekarang");
            } else {
                header("Location: home.php?filter=$tgl_sekarang");
            }
        } else {

            if ($count2 == 0) {
                if ($jam_sekarang > $absen_masuk) {

                    $status = "T";
                    $add = "INSERT INTO absen VALUES  ('', '$kartu', '$nama', '$jam_sekarang','', '$status')";
                    mysqli_query($conn, $add);
                    header("Location: home.php?filter=$tgl_sekarang");
                } else {
                    $status = "BAP";
                    $add = "INSERT INTO absen VALUES  ('', '$kartu', '$nama', '$jam_sekarang','', '$status')";
                    mysqli_query($conn, $add);
                    header("Location: home.php?filter=$tgl_sekarang");
                } 
            }
        }
    }
} else {
    echo "invalid";
    header("Location: home.php?filter=$tgl_sekarang");
}
