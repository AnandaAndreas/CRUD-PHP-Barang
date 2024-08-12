<?php 
    session_start();

    if(!isset($_SESSION["login"]) ){
        header("location:login_admin.php");
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tittle{
            background-color: whitesmoke;
        }
    </style>
</head>
<body>
    <div class="container mt-4">

    <div class="tittle d-flex justify-content-between ">
            <div class="m-2">
                <h3 class="">Data Barang</h3>
                <a href="halamanbarang.php" class="btn btn-secondary">Back</a>
            </div>
            <div class="m-2">
                <a href="logout_admin.php" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <table class="table table-striped">
                <tr>
                    <th>No.</th>
                    <th>Admin</th>
                    <th>Aktivitas</th>
                    <th>Detail Aktivitas</th>
                    <th>Waktu</th>
                    <th>Barang</th>
                </tr>
        <?php 
        include "config.php";
        $sql = "SELECT h.id_historyBarang, h.Aktivitas,h.detail_aktivitas,h.waktu, a.username, b.nama_barang
                FROM tbhistorybarang_2407 h
                INNER JOIN tbadmin_2407 a ON h.id_admin = a.id_admin
                INNER JOIN tbbarang_2407 b ON h.id_barang = b.id_barang";
        $hasil = mysqli_query($config,$sql);
        $no = 1;
        if (!$hasil) {
            die("Query error: " . mysqli_error($config)); // Cetak pesan kesalahan jika terjadi kesalahan dalam query
        }
        
        while ($data = mysqli_fetch_array($hasil)){
        ?>
        <tr>
            <td><?= $no ; ?></td>
            <td><?= $data['username'];?></td>
            <td><?= $data['Aktivitas'];?></td>
            <td><?= $data['detail_aktivitas'] ?></td>
            <td><?= $data['waktu'] ?></td>
            <td><?= $data['nama_barang']; ?></td>
        </tr>
        <?php
            $no++;
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>

