<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
session_start();
include "koneksi.php";

$id = $_POST["id"];
$kartu = $_POST["kartu"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$ttl = $_POST["ttl"];
$kelamin = $_POST["kelamin"];

$query = "
			UPDATE tbguru SET  
                kartu = '$kartu',
                nama = '$nama',
				alamat = '$alamat',
				ttl = '$ttl',
				kelamin= '$kelamin'
				WHERE id= $id
			";

$result = mysqli_query($conn, $query);
// header("Location:data-guru.php");
if (mysqli_affected_rows($conn) > 0) { 
    
    $_SESSION["ubah"] = 'Data Berhasil Diubah';
    
    //redirect ke halaman index.php
    header('Location: data-guru.php');   
}
		else {
			$_SESSION["ubah"] = 'Data Berhasil Diubah';
    
			//redirect ke halaman index.php
			header('Location: data-guru.php'); 
}
