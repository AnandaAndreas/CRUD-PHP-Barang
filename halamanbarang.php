<?php 
session_start();
include "config.php";

if(!isset($_SESSION["login"]) ){
    header("location:login_admin.php");
} 
if(isset($_SESSION['username_admin'])){

    $name = $_SESSION['username_admin'];
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="container mt-4">

        <div class="tittle d-flex justify-content-between ">
            <div class="m-2">
                <h3 class="">Data Barang</h3>
                <a href="halamanhistory.php" class="btn btn-secondary">History</a>
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#Modaltambahbarang">
                    Tambah
                </button>
            </div>
            <div class="m-2">
                <a href="logout_admin.php" class="btn btn-danger">Logout</a>
            </div>
            <?php include "barang_tambah.php"; // Include modal file ?>
        </div>

        <table class="table table-striped">
            <div class="wraper ">
            <tr>
                <thead class="">
                    <th >No.</th>
                    <th >Nama</th>
                    <th >PG-Rating</th>
                    <th >Harga</th>
                    <th >Stok</th>
                    <th >Tanggal Rilis</th>
                    <th>Cerita</th>
                    <th >Foto</th>
                    <th >Act</th>
                </thead>
            </tr>

        <?php 
        

        $sql = "SELECT *
            FROM tbbarang_2407
            ORDER BY tbbarang_2407.nama_barang";

        $hasil = mysqli_query($config,$sql);
        $no = 1;
        if (!$hasil) {
            die("Query error: " . mysqli_error($config)); // Cetak pesan kesalahan jika terjadi kesalahan dalam query
        }
        
        while ($data = mysqli_fetch_array($hasil)){
        ?>

        <tr>
            <td><?= $no ; ?></td>
            <td><?= $data['nama_barang'];?></td>
            <td><?= $data['PG_Rating'];?></td>
            <td><?= $data['harga_barang']; ?></td>
            <td><?= $data['stok_barang']; ?></td>
            <td><?= $data['tanggal_rilis']; ?></td>
            <td><?= $data['cerita'] ?></td>
            <td><img src="imgBarang/<?= $data['foto_barang'] ?>" width="50px" height="70px"></td>
            <td>
                <a href="barang_edit.php?id_barang=<?=$data['id_barang'];?>">Edit</a>
                <a href="barang_hapus.php?id_barang=<?=$data['id_barang'];?>" onclick="return confirm('Hapus Data <?= $data['nama_barang']?> ?')">Hapus</a>
            </td>
        </tr>

        <?php
        $no++;
        }
        echo "</table>";
        ?>
    </div>
    <script>

</script>
</body>
</html>

