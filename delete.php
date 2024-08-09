<?php
include"koneksi.php";

$id_program = $_GET['id_program'];

$hapus = mysqli_query($koneksi, "DELETE FROM program WHERE id_program='$id_program'");

if ($hapus) {
    echo "<script>
    alert('Data berhasil dihapus');
    window.location.href='home.php';
    </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus');
    </script>";
}
?>