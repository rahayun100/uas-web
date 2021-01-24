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
			document.location='tambahuser.php';
			</script>";

		}else{
			echo "<script>
			alert('edit data gagal!');
			document.location='tambahuser.php';
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
			document.location='tambahuser.php';
			</script>";

		}else{
			echo "<script>
			alert('simpan data gagal!');
			document.location='tambahuser.php';
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
			document.location='tambahuser.php';
			</script>";
		}

	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Jasa Service Printer</title>
	<link rel="stylesheet" type="text/css" href="csss/bootstrap.min.css">
	<link rel="icon"  href="./aset/ser.jpg">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
	<!--header-->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Gemoy</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profile.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>

			</ul>
		</div>
	</header>

	<div class="card-body">
		<form method="POST" action="">
			<div class="card-heade bg-success text-white text-center">
				<b> TAMBAH TABLE</b>
			</div>

			<div class="form-group">
				<label>ID</label>
				<input type="text" name="txt_id" value="<?=@$vkb?>" class="form-control" placeholder="Input ID" required=""> <!--required fungsinya untuk menampilkan perintah agar tidak blh kosong-->
			</div>
			<div class="form-group">
				<label>USER NAME</label>
				<input type="text" name="txt_username"  value="<?=@$vkp?>" class="form-control" placeholder="Input Username" required=""> <!--required fungsinya untuk menampilkan perintah agar tidak blh kosong-->
			</div>

			<div class="form-group">
				<label>PASSWORD</label>
				<input type="text" name="txt_password"  value="<?=@$vnb?>" class="form-control" placeholder="Input Password" required=""> <!--required fungsinya untuk menampilkan perintah agar tidak blh kosong-->
			</div>

			<button type="Submit" class="btn btn-primary" name="buttonsimpan"> Simpan </button>
			<button type="Reset" class="btn btn-danger" name="buttonreset"> Reset </button>

		</form>
	</div>
	<!--ini akhir card form-->

	<!--ini awal card tabel-->
	<div class="card mt-3">
		<div class="card-heade bg-success text-white text-center">
			<b> Daftar User</b>
		</div>
		<div class="card-body">

			<table class="table table-bordered table-striped"> <!--tabel strip = membuat tabel menjadi abu di header-->
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">USERNAME</th>
					<th class="text-center">PASSWORD</th>
					
				</tr>

				<?php
				$no=1;
				$tampil=mysqli_query($koneksi, "SELECT * FROM setlogin order by id ");
				while ($data=mysqli_fetch_array($tampil)) :
					?>
					<tr>

						<td class="text-center"><?=$data['id']?></td>
						<td class="text-center"><?=$data['username']?></td>
						<td class="text-center"><?=$data['password']?></td>

						
					</tr>
				<?php endwhile; //penutup perulangan while?>

			</table>
			<a href="profile.php" class="btn btn-secondary" > KEMBALI</a>

		</div>
		<!--ini akhir card tabel-->
	</div>

	
	<footer class="text-center p-4">
		<h4 class="text-dark">Desain By rizka</h6>
			<small>Copyright &copy; 2021</small>
		</div>



	</body>
	</html>
