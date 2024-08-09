<?php
include'koneksi.php';



?>

<html lang="en">

<head>

    <title>Biro ADM Pembangunan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <style>
    body {
        font-family: 'Spectral', serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h1,
    h2,
    h3,
    h4,
    h5 {
        color: white;
        font-weight: 600;
    }

    .page-header {
        background-color: #A52A2A;
        color: white;
        text-align: center;
        padding: 20px 0;
        font-size: 28px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
    }


    .section {
        padding: 20px;
    }

    .table-responsive {
        background-color: white;
        padding: 15px 15px;
        margin: 50px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
        max-width: 100%;
    }

    table {
        width: 80%;
        border-collapse: collapse;
    }

    thead tr {
        background-color: #A52A2A;
        color: white;
        font-weight: bold;
    }

    thead td {
        padding: 12px;
        text-align: center;
        border-right: 1px solid #ddd;
    }

    thead td:last-child {
        border-right: none;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    tbody td {
        padding: 10px;
        text-align: center;
        border-right: 1px solid #ddd;
    }

    tbody td:last-child {
        border-right: none;
    }


    .btn-primary {
        background-color: #A52A2A;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;
        display: inline-block;
        margin: 10px 0;
        text-align: center;
    }

    .btn-primary:hover {
        background-color: #F08080;
    }


    @media (max-width: 768px) {
        .table-responsive {
            padding: 10px;
        }

        thead td {
            font-size: 12px;
        }

        tbody td {
            padding: 8px;
            font-size: 12px;
        }
    }
    </style>
</head>

<body>

    <div class="page-header">
        <h1>LAPORAN REALISASI FISIK DAN PEMBANGUNAN</h1>
    </div>
    <section>

        <a href="add_view.php" class="btn btn-primary">Tambah Data</a> <a href="index.php"
            class="btn btn-primary">Logout</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td rowspan="2">No</td>
                    <td colspan="2">Program</td>
                    <!-- <td colspan="4">Fisik</td> -->
                    <td colspan="7">Keuangan</td>
                    <td rowspan="2">Sisa Anggaran</td>
                    <td rowspan="2">Aksi</td>
                </tr>
                <tr>

                    <td>Uraian</td>
                    <td>Pagu</td>
                    <td>Target</td>
                    <td>Target Percent</td>
                    <td>Realisasi</td>
                    <td>Realisasi Percent</td>
                    <td>Capaian</td>
                    <td>Deviasi</td>
                    <td>Warna</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                                    $no=1;
                                    $laporan = mysqli_query($koneksi, "SELECT * FROM program 
                                    ORDER BY id_program ASC");
                                    
                                    while ($item = mysqli_fetch_array($laporan))  { 
                                        $deviasi = $item['deviasi'];
                                    
                                        if ($deviasi > 0) {
                                            
                                            $warna_text = 'Ungu';
                                        } elseif ($deviasi >= -5) {
                                            
                                            $warna_text = 'Hijau';
                                        } elseif ($deviasi >= -10) {
                                            
                                            $warna_text = 'Kuning';
                                        } 
                                        else {
                                            
                                            $warna_text = 'Merah';
                                        }
                                    ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $item['nm_program']?></td>
                    <td><?= number_format($item['pagu'], 2, ',', '.') ?></td>
                    <td><?= number_format($item['targets'], 2, ',', '.') ?></td>
                    <td><?= number_format($item['target_percent'], 2, ',', '.') ?> % </td>
                    <td><?= number_format($item['realisasi'], 2, ',', '.') ?></td>
                    <td><?= number_format($item['realisasi_percent'], 2, ',', '.') ?> % </td>
                    <td><?= number_format($item['capaian'], 2, ',', '.') ?></td>
                    <td><?= number_format($item['deviasi'], 2, ',', '.') ?></td>

                    <td><?= $warna_text ?></td>
                    <td><?= number_format($item['sisa_anggaran'], 2, ',', '.') ?></td>

                    <td>
                        <a href="delete.php?id_program=<?php echo $item['id_program']; ?>"
                            class="btn btn-primary">Hapus</a>
                        <a href="ubah.php?id_program=<?php echo $item['id_program']; ?>"
                            class="btn btn-primary">Ubah</a>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>


</body>
<!-- <a href="index.php" class="btn btn-primary">Logout</a> -->


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.stellar.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.animateNumber.min.js"></script>
<script src="assets/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
</script>
<script src="assets/js/google-map.js"></script>
<script src="assets/js/main.js"></script>

</html>