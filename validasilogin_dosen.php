<?php 

include ('koneksi.php');
$user = $_POST['username'];
$pass = $_POST['password'];

if (!empty($user) && !empty($pass)){
	session_start();

	$sql = mysqli_query($conn, "SELECT * FROM tbl_dosen WHERE NIP='$user' AND Pw='$pass'");
	$result = mysqli_num_rows($sql);
	if($result){
		$d = mysqli_fetch_object($sql);
		$_SESSION['status login'] = true;
		$_SESSION['a_global'] =$d;
		$_SESSION['a_id'] =$admin_id;
		header('Location: dosen.php');
	} else {
		echo "<script>window.alert('LOGIN GAGAL! Username atau Password tidak benar !');
		window.location=(href='login_dosen.php')</script>";
	}
} 
?>

