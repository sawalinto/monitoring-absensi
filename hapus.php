<?php
session_start();
include 'koneksi.php';


$id = $_GET["id"];
// function hapus($id){
//     global $conn;

//     mysqli_query($conn,"DELETE FROM tbguru WHERE id= $id");

//     return mysqli_affected_rows ($conn);

// }
$result = mysqli_query($conn, "DELETE FROM tbguru WHERE id= $id");
// $hapus = mysqli_affected_rows ($conn);
if ($result = true) {
    
    $_SESSION["hapus"] = 'Data Berhasil Dihapus';
    ?>

    <script>
        document.location.href = 'data-guru.php';
    </script>

<?php
}
else {
    $_SESSION["hapus"] = 'Data Gagal Dihapus';
    ?>

    <script>
        document.location.href = 'data-guru.php';
    </script>

<?php
}
?>