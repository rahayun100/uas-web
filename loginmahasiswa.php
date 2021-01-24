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
  <title>Menu Login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">



</head>
<body>
  <h1>Login Mahasiswa</h1>

  <div class="panel_login">

    <h2>Masuk Akun</h2>
    <form action="validasilogin_mahasiswa.php" method="POST">
     <label>NIM</label>
     <input type="text" name="username" class="form_login" placeholder="Username" required="required">

     <label>PASSWORD</label>
     <input type="password" name="password" class="form_login" placeholder="Password" required="required">

     <input type="submit" class="tombol_login" value="LOGIN">
     <a href="mahasiswa.php"></a>
     <br/>
     <br/>

   </form>
 </div>
</body>
</html>


