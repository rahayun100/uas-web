<?php
//koneksi database
$server ="localhost";
$user ="root";
$pass ="";
$database="jual";

$koneksi=mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));
//

?>

<!DOCTYPE html>
<html>
<head>
  <title>Menu Login ADMIN</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/login.css" rel="stylesheet">


</head>
<body>
  <h1 class="text-center" style="">HALAMAN LOGIN ADMIN</h1>
  <div class="panel_login">
    <h2>Masuk Akun</h2>
    <form action="login_2.php" method="POST">
     <label>Username</label>
     <input type="text" name="username" class="form_login" placeholder="Username" required="required">

     <label>Password</label>
     <input type="password" name="password" class="form_login" placeholder="Password" required="required">

     <input type="submit" class="tombol_login" value="LOGIN">
     <a href="utama.php"></a>
     <br/>
     <br/>

   </form>
 </div>
</body>
</html>


