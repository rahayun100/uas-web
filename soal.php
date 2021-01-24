<?php
@session_start();
include_once('database.php');

$tampil = mysqli_query($conn, "SELECT * FROM tbl_materi LEFT JOIN  tbl_matkul ON(tbl_materi.Id_Matkul = tbl_matkul.Id_Matkul) WHERE Id='$_GET[id]'");
$data = mysqli_fetch_array($tampil);
if ($data) {
    //jika data ditemukan maka data di tampung dulu ke variabel

    $vNama_Matkul = $data['Nama_Matkul'];
    $per = $data['Pertanyaan'];
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
                <div class="sidebar-brand-text mx-3">E-Learning</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <span>Home</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">



                <!-- Nav Item  -->
                <li class="nav-item">
                    <a class="nav-link" href="mahasiswa.php">
                        <span>Mahasiswa</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <li class="nav-item">
                        <a class="nav-link" href="Matakuliah.php">
                            <span>Matakuliah</span></a>
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
                                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mr-sm-2 far fa-bell"></i>
                                                        <i class="far fa-comment-alt mr-sm-2"></i>
                                                        <img src="img/user.jpg" width="30" height="30" alt="">

                                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello, Ainun User</span>

                                                    </a>
                                                </li>

                                            </ul>
                                        </nav>
                                        <!-- End of Topbar -->

                                        <!-- Begin Page Content -->
                                        <div class="container-fluid">

                                            <!-- Page Heading -->
                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                <h1 class="h3 mb-0 text-gray-800">Berita</h1>
                                            </div>
                                            <div class="card-body">
                                                <h2>TUGAS</h2>
                                                <div class="card shadow mb-4">
                                                    <!-- Card Body -->
                                                    <div class="card-body">
                                                        <h2 class="text-center"><?= $vNama_Matkul ?></h2>
                                                        <p><?= $per ?></p>
                                                        <div class="form-group">
                                                            <label>Jawab</label>
                                                            <textarea class="form-control" name="jwb" placeholder="ALAMAT ANDA" required>Tuliskan Jawaban Anda....</textarea>
                                                            <a href="home.php" class="btn btn-outline-dark mt-3">Kirim</a>
                                                        </div>
                                                    </div>
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