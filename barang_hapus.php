<?php 

    include "config.php";
    $idBarang = $_GET['id_barang'];
    //query untuk hapus foto dari folder
    $fotoBarang = "SELECT foto_barang FROM tbbarang_2407
                    WHERE id_barang='$idBarang'";
    $hasilBarang = mysqli_query($config,$fotoBarang);
    $data = mysqli_fetch_assoc($hasilBarang);

    $sql = "DELETE FROM tbbarang_2407 WHERE id_barang='$idBarang'";
    $hasil = mysqli_query($config, $sql);

    //jika data berhasil dihapus foto di folder juga terhapus
    if($hasil){
        unlink("imgBarang/".$data['foto_barang']);
    }

    

    echo"<script> alert ('Data berhasil dihapus')</script>";
    header("location:halamanbarang.php")

?>