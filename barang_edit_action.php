<?php 
    session_start();
    require 'history.php';
    include "config.php";
    
    $id_barang=$_POST['id_barang'];
    $namaBarang=$_POST['nama_barang'];
    $PgRating=$_POST['PG_Rating'];
    $hargaBarang=$_POST['harga_barang'];
    $stokBarang=$_POST['stok_barang'];
    $tanggalRilis=$_POST['tanggal_rilis'];
    $cerita = $_POST['cerita'];
    //cek apakah admin ingin mengubah foto
    if(isset($_POST['ubah_foto']) ){
        //ambil data foto dari form
        $foto_baru = $_FILES['foto_barang']['name'];
        $nama_gambar = $_FILES['foto_barang']['tmp_name'];

        //set path folder tempat menyimpan foto
        $path = "imgBarang/".$foto_baru;

        if(move_uploaded_file($nama_gambar, $path)){ // Cek apakah gambar berhasil diupload atau tidak

            // Query untuk menampilkan data user berdasarkan id_user yang dikirim
            $query = "SELECT * FROM tbbarang_2407 WHERE id_barang='".$id_barang."'";
            $sql = mysqli_query($config,$query); // Eksekusi/Jalankan query dari variabel $query
            $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

            //cek apakah file gambar sudah ada
            if(is_file("imgBarang/".$data['foto_barang']) ){
                unlink("imgBarang/".$data['foto_barang']); // hapus foto dari folder
            }
            //ubah data database
            $sql = "UPDATE tbbarang_2407
                    SET nama_barang='$namaBarang',
                        PG_Rating='$PgRating',
                        harga_barang='$hargaBarang',
                        stok_barang='$stokBarang',
                        tanggal_rilis='$tanggalRilis',
                        cerita='$cerita',
                        foto_barang='$foto_baru'
                    WHERE id_barang='$id_barang'";
            $hasil = mysqli_query($config,$sql) OR die("Query error : ".mysqli_error($config));

        }else{
            echo "<script>
                    alert('Gambar Gagal diUpload!');
                    document.location.href = 'halamanbarang.php';
                </script>";
        }

    }else{
        $sql = "UPDATE tbbarang_2407
                SET nama_barang='$namaBarang',
                    PG_Rating='$PgRating',
                    harga_barang='$hargaBarang',
                    stok_barang='$stokBarang',
                    tanggal_rilis='$tanggalRilis',
                    cerita = '$cerita'
                WHERE id_barang='$id_barang'";
        $hasil = mysqli_query($config,$sql) OR die("Query error : ".mysqli_error($config)) ;
        
    }

        if ($hasil) {
            // Setelah Create berhasil, catat histori aktivitas
            $admin = $_SESSION["admin"];
            $detail_aktivitas = 'Barang  dengan ID: ' . $id_barang. ' diupdate';
            catatHistoriAktivitas('update', $admin, $id_barang, $detail_aktivitas);
            header("location:halamanbarang.php");
            return true;
        } else {
            return false;
        }
        header("location:halamanbarang.php");

?>