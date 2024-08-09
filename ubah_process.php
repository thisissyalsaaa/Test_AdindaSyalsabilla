<?php
include "koneksi.php";

$id_program = $_POST['id_program'];
$nm_program = $_POST['nm_program'];
$pagu = $_POST['pagu'];
$targets = $_POST['targets'];
$realisasi = $_POST['realisasi'];

// Update data utama
$update = mysqli_query($koneksi, "UPDATE program SET nm_program = '$nm_program', pagu = '$pagu', targets = '$targets', realisasi = '$realisasi' WHERE id_program = '$id_program'");

if ($update) {
    // Hitung persentase dan nilai lainnya
    $target_percent = ($targets / $pagu) * 100;
    $realisasi_percent = ($realisasi / $pagu) * 100;
    $capaian = ($realisasi_percent / $target_percent) * 100;
    $deviasi = $realisasi_percent - $target_percent;
    $sisa_anggaran = $pagu - $realisasi;
    
    // Update perhitungan
    $update_perhitungan = mysqli_query($koneksi, "UPDATE program SET 
        target_percent = '$target_percent', 
        realisasi_percent = '$realisasi_percent',
        capaian = '$capaian', 
        deviasi = '$deviasi', 
        sisa_anggaran = '$sisa_anggaran' 
        WHERE id_program = '$id_program'");
    
    if ($update_perhitungan) {
        echo "<script>
        alert('Data berhasil diubah');
        window.location.href='home.php';
        </script>";
    } else {
        echo "<script>
        alert('Perhitungan gagal diubah: " . mysqli_error($koneksi) . "');
        window.location.href='ubah.php?id_program=$id_program';
        </script>";
    }
} else {
    echo "<script>
    alert('Data gagal diubah: " . mysqli_error($koneksi) . "');
    window.location.href='ubah.php?id_program=$id_program';
    </script>";
}
?>