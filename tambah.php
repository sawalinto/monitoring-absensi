<?php
session_start();
include "koneksi.php";

$kartu = $_POST['kartu'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$ttl = $_POST['tanggal'];
$kelamin = $_POST['kelamin'];

if (isset($_POST['submit'])) { 
    $add = "INSERT INTO tbguru VALUES ('', '$kartu', '$nama', '$alamat', '$ttl', '$kelamin' )";
    mysqli_query($conn, $add);

    
    $_SESSION["tambah"] = 'Data Berhasil Ditambah';
    ?>

    <script>
        document.location.href = 'data-guru.php';
    </script>
<?php
} else {

    $_SESSION["tambah"] = 'Data Gagal Ditambah';
?>

    <script>
        document.location.href = 'data-guru.php';
    </script>
<?php
}
?>