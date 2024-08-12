<?php 

    session_start();
    include "config.php";
    // require 'barang_edit_action.php';
    if(!isset($_SESSION["login"]) ){
        header("location:login_admin.php");
    }

    $barang = $_GET['id_barang'];
    $sql = "SELECT * FROM tbbarang_2407 WHERE id_barang = '$barang'";
    $hasil = mysqli_query($config,$sql);
    $data = mysqli_fetch_assoc($hasil);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container card" style="width: 500px;">
    <form action="barang_edit_action.php" method="POST" enctype="multipart/form-data" class="row" >
        <h3>Halaman Edit Barang</h3>
        <input type="text" value="<?= $data['id_barang']?>" name="id_barang" class="form-control" hidden>
        <div class="col-md-12">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" value="<?= $data['nama_barang']?>" name="nama_barang" class="form-control">
        </div>
            <div class="col-md-12">
                <label for="">PG-Rating</label><br>
                <input type="radio" name="PG_Rating" id="7+" value="7+" <?php if($data['PG_Rating'] == '7+') {echo 'checked';}?> >7+ <br>
                
                <input type="radio" name="PG_Rating" id="12+" value="12+" <?php if($data['PG_Rating'] == '12+') {echo 'checked';} ?>>12+ <br>
                
                <input type="radio" name="PG_Rating" id="15+" value="15+" <?php if($data['PG_Rating'] == '15+') {echo 'checked';} ?>>15+ <br>
                
                <input type="radio" name="PG_Rating" id="18+" value="18+" <?php if($data['PG_Rating'] == '18+') {echo 'checked';} ?>>18+ <br>
            </div>
            <div class="col-md-12">
                <label for="harga_barang">Harga Barang</label>
                <input type="number" name="harga_barang" value="<?=$data['harga_barang']?>" class="form-control">
            </div>     
            <div class="col-md-12">
                <label for="stok_barang">Stok Barang</label>
                <input type="number" name="stok_barang" value="<?=$data['stok_barang']?>" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="tanggal">Tanggal Rilis</label>
                <input type="date" name="tanggal_rilis" value="<?=$data['tanggal_rilis']?>" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="cerita">Cerita</label><br>
                <textarea name="cerita" id="cerita" cols="30" rows="10"><?= $data['cerita'] ?></textarea>
            </div>
            <div class="col-md-12">
                <img src="imgBarang/<?= $data['foto_barang'] ?>" width="150px" height="120px" ></br>
                <input type="checkbox" name="ubah_foto" value="true" >Ubah Foto <br>
                <input type="file" name="foto_barang" value="<?=$data['foto_barang']?>" >
            </div>
            <div class="col-md-12 d-flex justify-content-between mt-4">
                <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                <a href="halamanbarang.php" class="btn btn-secondary">Kembali </a>
            </div>
        </table>
    </form>
    </div>
</body>
</html>