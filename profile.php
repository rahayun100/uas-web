<?php
//koneksi database
$server ="localhost";
$user ="root";
$pass ="";
$database="db_elearning";

$koneksi=mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

//jika tombol simpan di klik 
if (isset($_POST['buttonsimpan'])) 
{
   //pengujian apakah data akan di edit atau simpan baru
  if ($_GET['hal']=="edit") {
    //data akan di edit
    $edit =mysqli_query($koneksi, "UPDATE setlogin set 
      id='$_POST[txt_id]',
      username='$_POST[txt_username]',
      password='$_POST[txt_password]'
      WHERE id ='$_GET[id]'
      ");

    if($edit)// jika edit data sukses
    {
      echo "<script>
      alert('edit data sukses!');
      document.location='ubahuser.php';
      </script>";

    }else{
      echo "<script>
      alert('edit data gagal!');
      document.location='ubahuser.php';
      </script>";

    }



  }else{
    //data akan di simpan baru

    $simpan =mysqli_query($koneksi, "INSERT INTO setlogin (id,username, password)
      VALUES ('$_POST[txt_id]',
      '$_POST[txt_username]',
      '$_POST[txt_password]')
      ");

    if($simpan)// jika simpan suskses
    {
      echo "<script>
      alert('simpan data sukses!');
      document.location='ubahuser.php';
      </script>";

    }else{
      echo "<script>
      alert('simpan data gagal!');
      document.location='ubahuser.php';
      </script>";

    }
  }

  
}
// pengujian edit dan hapus

if (isset($_GET['hal'])) {
  //pengujian jika edit data
  if ($_GET['hal']=="edit") {
    //tampilkan data yang akan di edit
    $tampil=mysqli_query($koneksi, "SELECT * FROM setlogin WHERE id='$_GET[id]'");
    $data=mysqli_fetch_array($tampil);
    if ($data) {
      //jika data ditemukan , maka data di tampung ke dalam variabel
      $vkb=$data['id'];
      $vkp=$data['username'];
    }
  }
  elseif($_GET['hal']=="hapus"){
    //persiapan hapus data
    $hapus=mysqli_query($koneksi, "DELETE FROM setlogin WHERE id='$_GET[id]'");
    if ($hapus) {
      echo "<script>
      alert('hapus data berhasil!');
      document.location='ubahuser.php';
      </script>";
    }

  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="csss/bootstrap.min.css">
  <link rel="icon"  href="./img/1.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | toko</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body >

  <!--ini akhir card form-->

  <!--ini awal card tabel-->
  <div class="card mt-3">
    <div class="card-heade bg-success text-white text-center">
      <b> Daftar User</b>
    </div>
    <div class="card-body">

      <table class="table table-bordered table-striped"> <!--tabel strip = membuat tabel menjadi abu di header-->
        <tr>
          <th class="text">ID</th>
          <th class="text">USERNAME</th>

        </tr>

        <?php
        $no=1;
        $tampil=mysqli_query($koneksi, "SELECT * FROM setlogin order by id ");
        while ($data=mysqli_fetch_array($tampil)) :
          ?>
          <tr>

            <td><?=$data['id']?></td>
            <td><?=$data['username']?></td>


          </tr>
        <?php endwhile; //penutup perulangan while?>

      </table>
      <a href="tambahuser.php ?hal=tambah&id=<?=$data['id']?>" class="btn btn-primary" > TAMBAH</a>
      <a href="ubahuser.php ?hal=edit&id=<?=$data['id']?>" class="btn btn-secondary" > EDIT</a>
      <a href="admin.php" class="btn btn-warning" > KEMBALI</a>
    </div>
    <!--ini akhir card tabel-->
  </div>
  <!-- footer -->

  <footer class="text-center p-4">
    <h4 class="text-dark">Desain By Rahayun</h4>
    <small>Copyright &copy; 2021 - Gemoy Banget</small>
  </div>



</body>
</html>
