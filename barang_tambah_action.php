<?php 
    include "config.php";
    require 'history.php';
    

    function tambahBarang($data) {
        global $config;

        $namaBarang = htmlspecialchars($data["nama_barang"]);
        $PgRating = $data['PG_Rating'];
        $hargaBarang = htmlspecialchars($data["harga_barang"]);
        $stokBarang = htmlspecialchars($data["stok_barang"]);
        $tanggalRilis = htmlspecialchars($data["tanggal_rilis"]);
        $cerita = htmlspecialchars($data["cerita"]);
        // $fotoBarang = htmlspecialchars($data["foto"]);

        $fotoBarang = uploadFotoBarang();
        if(!$fotoBarang){
            return false;
        }
        $sql = "INSERT INTO tbbarang_2407
                VALUES
                ('','$namaBarang','$PgRating','$hargaBarang','$stokBarang','$tanggalRilis','$cerita','$fotoBarang')";
        
        if (mysqli_query($config, $sql)) {
            // Setelah Create berhasil, catat histori aktivitas
            $admin = $_SESSION["admin"];
            $id_barang_baru = mysqli_insert_id($config);
            $detail_aktivitas = 'Barang baru ditambahkan dengan ID: ' . $id_barang_baru;
            catatHistoriAktivitas('create', $admin, $id_barang_baru, $detail_aktivitas);
            header("location:halamanbarang.php");
            return true;
        } else {
            return false;
        }


        return mysqli_affected_rows($config);
    }


    function uploadFotoBarang()  {
        $namaFile = $_FILES['foto_barang']['name'];
        $error = $_FILES['foto_barang']['error'];
        $tmpName = $_FILES['foto_barang']['tmp_name'];
        

        // cek apakah tidak ada gambar yang diupload
        if($error === 4){
            return false;
        }

        $gambarValid = array('jpg', 'png', 'jpeg',); //jenis file apa saja yang boleh
        $fileNameExtension = explode(".", $namaFile); // memecah nama file dan ektensi gambar.jpg = "gambar", "jpg"
        $fileNameExtension = strtolower(end($fileNameExtension)); // mengambil data terakhir yaitu ekstensi
        
        if(!in_array($fileNameExtension,$gambarValid) ){
            echo "<script>
                    alert('Jenis File Tidak Valid');
                </script>";
            return false;
        }
        move_uploaded_file($tmpName, 'imgBarang/'.$namaFile);
        return $namaFile;
        
    }

?>