<?php
include "koneksi.php";

$nm_program = $_POST['nm_program'];
$pagu = $_POST['pagu'];
$targets = $_POST['targets'];
$realisasi = $_POST['realisasi'];


$tambah = mysqli_query($koneksi, "INSERT INTO program (nm_program, pagu, targets, realisasi) 
VALUES ('$nm_program', '$pagu', '$targets', '$realisasi')");

if ($tambah) {
    $last_id = mysqli_insert_id($koneksi);
    
    $target_percent = ($targets / $pagu) * 100;
    $realisasi_percent = ($realisasi / $pagu) * 100;
    $capaian = ($realisasi_percent / $target_percent) * 100;
    $deviasi = $realisasi_percent - $target_percent;
    $sisa_anggaran = $pagu - $realisasi;
    
    $update = mysqli_query($koneksi, "UPDATE program SET 
        target_percent = '$target_percent', 
        realisasi_percent = '$realisasi_percent',
        capaian = '$capaian', 
        deviasi = '$deviasi', 
        sisa_anggaran = '$sisa_anggaran' 
        WHERE id_program = '$last_id'");
    
    if ($update) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        window.location.href='home.php';
        </script>";
    } else {
        echo "<script>
        alert('Perhitungan gagal ditambahkan: " . mysqli_error($koneksi) . "');
        window.location.href='add_view.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Data gagal ditambahkan: " . mysqli_error($koneksi) . "');
    window.location.href='add_view.php';
    </script>";
}
?>