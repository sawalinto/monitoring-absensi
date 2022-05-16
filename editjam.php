<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
include "koneksi.php";


 $id = $_POST['id'];
 $jam_masuk = $_POST['masuk'];
 $jam_pulang = $_POST['pulang'];

 $query = "
 UPDATE jamabsen SET  
     jam_masuk = '$jam_masuk',
     jam_pulang = '$jam_pulang'
     
     WHERE id= $id
 ";

 $result = mysqli_query($conn, $query);

 if ($result == true) {
     $_SESSION["ubah"] = 'Data Berhasil Diubah';
     // header('Location: setting.php');
?>
     <script>
         document.location.href = 'setting.php';
     </script>
     <!-- header('Location: data-guru.php'); -->

<?php
 } else {
     $_SESSION["ubah"] = 'Data Berhasil Diubah';

     //redirect ke halaman index.php
     header('Location: data-guru.php');
 }
?>