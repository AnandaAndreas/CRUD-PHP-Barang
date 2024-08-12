<?php 

    if(isset($_POST['login'])){
        session_start();
        include("config.php");
    
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
    
        $sql = "SELECT * FROM tbadmin_2407
                WHERE username = '$username'
                AND password = '$password'";
            
    
        $hasil = mysqli_query($config,$sql);
        if (!$hasil) {
            die("Query error: " . mysqli_error($config)); // Cetak pesan kesalahan jika terjadi kesalahan dalam query
        }
    
        if(mysqli_num_rows($hasil) > 0){
            $data = mysqli_fetch_array($hasil);
            $_SESSION['admin'] = $data['id_admin'];
            $_SESSION["login"] = true;
            header("Location:halamanbarang.php");
            exit();
        }
        
        $error = true;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
    
    
    <form style="width: 300px;"  class="row g-3 card container " action="" method="POST">
        <h1>Login Admin</h1>
    <?php if (isset($error)) : ?>
        <h4> Akun Tidak Ada </h4>
    <?php endif; ?>
                <div class="col-md-12">
                    <label for="txtUsername">Username</label>
                    <input class="form-control" type="text" name="txtUsername" placeholder="username">    
                </div>
                <div class="col-md-12">
                    <label for="txtPassword">Password</label>
                    <input class="form-control" type="password" name="txtPassword" placeholder="password"> 
                </div>
                <button type="submit" class="btn btn-primary mb-4" name="login">Login</button>
        </form>
    
</body>
</html>