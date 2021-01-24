<?php
@session_start();
include 'database.php';

$sql = 'SELECT * FROM tbl_matkul LEFT JOIN tbl_dosen ON(tbl_matkul.NIP = tbl_dosen.NIP)';
$mat = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>E-learning ONE PIECE </title>

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
                                                <h1 class="h3 mb-0 text-gray-800">Materi Pelajaran</h1>
                                            </div>

                                            <div class="container mt-3">
                                                <div class="card">
                                                    <div class="card-header mb-3">
                                                        INPUT DATA MATAKULIAH
                                                    </div>
                                                    <!-- end -->

                                                    <!-- Card Body -->
                                                    <div class="card-body">

                                                        <table class="table table-hover ">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">KODE MATAKULIAH</th>
                                                                    <th scope="col">NAMA MATAKULIAH</th>
                                                                    <th scope="col">SKS </th>
                                                                    <th scope="col">RUANGAN</th>
                                                                    <th scope="col">NAMA DOSEN</th>
                                                                    <th scope="col">ACTION</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                while ($data = mysqli_fetch_object($mat)) {

                                                                    ?>
                                                                    <tr>
                                                                        <th><?= $data->Id_Matkul ?></th>
                                                                        <td><?= $data->Nama_Matkul ?></td>
                                                                        <td><?= $data->SKS ?></td>
                                                                        <td><?= $data->Ruang ?></td>
                                                                        <td><?= $data->Nama_Dosen ?></td>
                                                                        <td>
                                                                            <a href="pelajaran.php?hal=soal&id=<?= $data->Id_Matkul ?>" class="btn btn-outline-secondary">Buat Tugas</a>

                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
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