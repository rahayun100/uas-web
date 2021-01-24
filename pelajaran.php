<?php
@session_start();
include 'database.php';

$tampil = mysqli_query($conn, "SELECT * FROM tbl_matkul LEFT JOIN tbl_dosen ON(tbl_matkul.NIP = tbl_dosen.NIP) WHERE Id_Matkul='$_GET[id]'");
$data = mysqli_fetch_array($tampil);
if ($data) {
    //jika data ditemukan maka data di tampung dulu ke variabel
    $vNama_Matkul = $data['Nama_Matkul'];
    $vNama_Dosen = $data['Nama_Dosen'];
    $vId_Matkul = $data['Id_Matkul'];
}
if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($conn, "INSERT INTO tbl_materi (Id_Matkul,NIM,Pertanyaan)
        VALUES ('$vId_Matkul','$_POST[NIM]' ,'$_POST[Pertanyaan]')
        ");
    if ($simpan) {
        echo "<script>
        alert('Simpan berhasil');
        document.location='matakuliahbck.php';
        </script>";
    } else {
        echo "<script>
        alert('Simpan gagal');
        document.location='matakuliahbck.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>E-learning Universitas ONE PIECE </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-text mx-3">E-Learning Universitas ONE PIECE</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <span>Home</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">



                <!-- Nav Item  -->
                <li class="nav-item">
                    <a class="nav-link" href="mahasiswabck.php">
                        <span>Mahasiswa</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <li class="nav-item">
                        <a class="nav-link" href="dosenbck.php">
                            <span>Dosen</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider">
                        <li class="nav-item">
                            <a class="nav-link" href="matakuliahbck.php">
                                <span>Matakuliah</span></a>
                            </li>

                            <!-- Divider -->
                            <hr class="sidebar-divider">
                            <li class="nav-item">
                                <a class="nav-link" href="materi.php">
                                    <span>Materi</span></a>
                                </li>

                                <hr class="sidebar-divider">
                                <li class="nav-item">
                                    <a class="nav-link" href="login_dosen.php">
                                        <span>Login Dosen! Click Here</span></a>
                                    </li>
                                    <hr class="sidebar-divider">
                                    <li class="nav-item">
                                        <a class="nav-link" href="loginmahasiswa.php">
                                            <span>Login Mahasiswa! Click Here</span></a>
                                        </li>
                                        <hr class="sidebar-divider">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">
                                                <span>Login admin! Click Here</span></a>
                                            </li>


                                        </ul>
                                        <!-- End of Sidebar -->

                                        <!-- Content Wrapper -->
                                        <div id="content-wrapper" class="d-flex flex-column">

                                            <!-- Main Content -->
                                            <div id="content">

                                                <!-- Topbar -->
                                                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                                                    <!-- Sidebar Toggle (Topbar) -->
                                                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                                        <i class="fa fa-bars"></i>
                                                    </button>



                                                    <!-- Topbar Navbar -->
                                                    <ul class="navbar-nav ml-auto">

                                                        <!-- Nav Item - User Information -->
                                                        <li class="nav-item dropdown no-arrow">
                                                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>

                                                        </a>
                                                    </li>

                                                </ul>
                                            </nav>
                                            <!-- End of Topbar -->

                                            <!-- Begin Page Content -->
                                            <div class="container-fluid">

                                                <!-- Page Heading -->
                                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
                                                </div>

                                                <div class="container mt-3">
                                                    <div class="card">
                                                        <div class="card-header mb-3">
                                                            INPUT DATA TUGAS
                                                        </div>
                                                        <!-- end -->

                                                        <!-- Card Body -->
                                                        <div class="card-body">


                                                            <h2 class="text-center">Matakuliah : <?= $vNama_Matkul ?></h2>
                                                            <h3 class="text-center">Dosen Pengampu : <?= $vNama_Dosen ?></h3>

                                                            <form method="post" action="" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label>Soal</label>
                                                                    <textarea class="form-control" name="Pertanyaan" placeholder="isikan dengan soal...." required><?= @$vAlamat ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Pilih Mahasiswa</label>
                                                                    <select class="form-control" name="NIM">
                                                                        <option value="<?= @$vNIM ?>"><?= @$vNIM ?></option>
                                                                        <?php
                                                                        $vi = 'SELECT * FROM tbl_mahasiswa';
                                                                        $hasil = mysqli_query($conn, $vi);
                                                                        while ($tampil = mysqli_fetch_object($hasil)) {

                                                                            ?>
                                                                            <option value=<?= $tampil->NIM ?>><?= $tampil->Nama ?></option>

                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Content Wrapper -->

                                        </div>
                                        <!-- End of Page Wrapper -->



                                        <!-- Bootstrap core JavaScript-->
                                        <script src="vendor/jquery/jquery.min.js"></script>
                                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                                        <!-- Core plugin JavaScript-->
                                        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                                        <!-- Custom scripts for all pages-->
                                        <script src="js/sb-admin-2.min.js"></script>

                                        <!-- Page level plugins -->
                                        <script src="vendor/chart.js/Chart.min.js"></script>

                                        <!-- Page level custom scripts -->
                                        <script src="js/demo/chart-area-demo.js"></script>
                                        <script src="js/demo/chart-pie-demo.js"></script>

                                    </body>

                                    </html>