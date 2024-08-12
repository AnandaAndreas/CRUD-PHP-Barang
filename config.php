<?php 
    $config = mysqli_connect("localhost","root","","uts_2407");
    if(!$config){
        die('Gagal terhubung ke MySQLi : '.mysqli_connect_error());
    }
?>