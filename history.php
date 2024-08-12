<?php 

function catatHistoriAktivitas($tindakan, $idAdmin, $idBarang, $detailAktivitas) {
    global $config;
    
    $waktu = date('Y-m-d H:i:s');
    
    $tindakan = mysqli_real_escape_string($config, $tindakan);
    $idAdmin = mysqli_real_escape_string($config, $idAdmin);
    $idBarang = mysqli_real_escape_string($config, $idBarang);
    $detailAktivitas = mysqli_real_escape_string($config, $detailAktivitas);
    
    $query = "INSERT INTO tbhistorybarang_2407 ( waktu,Aktivitas,detail_aktivitas, id_barang, id_admin) VALUES ('$waktu', '$tindakan','$detailAktivitas', '$idBarang',  '$idAdmin')";
    
    if (mysqli_query($config, $query)) {
        header("location:halamanbarang.php");
    } else {
        mysqli_error($config);
    }
}
?>