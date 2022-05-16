<?php
session_start();
?>



<?php if (@$_SESSION['tambah']) { ?>
    <script>
        swal("Good job!", "<?php echo $_SESSION['tambah']; ?>", "success");
    </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['tambah']);
} ?>


<?php if (@$_SESSION['ubah']) { ?>
    <script>
        swal("Good job!", "<?php echo $_SESSION['ubah']; ?>", "success");
    </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['ubah']);
} ?>



<?php if (@$_SESSION['hapus']) { ?>
    <script>
        swal({
                title: "Apakah Kamu Yakin?",
                text: "Data akan dihapus secara permanen",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("<?= $_SESSION['hapus']; ?>", {
                        icon: "success",
                    });
                } else {
                    swal("Happy good day!");
                }
            });
    </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['hapus']);
} ?>
