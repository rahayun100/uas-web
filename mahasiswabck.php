<?php
@session_start();
include_once('database.php');

if (isset($_POST['bsimpan'])) {

    if ($_GET['hal'] == "edit") {

        // data akan diedit
        $edit = mysqli_query($conn, "UPDATE tbl_mahasiswa set
            NIM = '$_POST[NIM]',
            Nama = '$_POST[Nama]',
            Alamat = '$_POST[Alamat]',
            No_Telpon = '$_POST[No_Telpon]',
            Jurusan = '$_POST[Jurusan]',
            Jenis_Kelamin = '$_POST[Jenis_Kelamin]',
            Pw = '$_POST[Pw]'
            WHERE NIM='$_GET[id]'
            ");
        if ($edit) {
            echo "<script>
            alert('Edit berhasil');
            document.location='mahasiswabck.php';
            </script>";
        } else {
            echo "<script>
            alert('Edit gagal');
            document.location='mahasiswabck.php';
            </script>";
        }
    } else {

        if (isset($_POST['bsimpan'])) {
            $simpan = mysqli_query($conn, "INSERT INTO tbl_mahasiswa (NIM,Nama, Alamat,  No_Telpon, Jurusan, Jenis_Kelamin, Pw)
                VALUES ('$_POST[NIM]','$_POST[Nama]' ,'$_POST[Alamat]' , '$_POST[No_Telpon]' , '$_POST[Jurusan]', '$_POST[Jenis_Kelamin]','$_POST[Pw]')
                ");
            if ($simpan) {
                echo "<script>
                alert('Simpan berhasil');
                document.location='mahasiswabck.php';
                </script>";
            } else {
                echo "<script>
                alert('Simpan gagal');
                document.location='mahasiswabck.php';
                </script>";
            }
        }
    }
}

if (isset($_GET['hal'])) {
    //pengujian  jika edit data
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE NIM='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //jika data ditemukan maka data di tampung dulu ke variabel
            $vNIM = $data['NIM'];
            $vNama = $data['Nama'];
            $vAlamat = $data['Alamat'];
            $vNo = $data['No_Telpon'];
            $vJurusan = $data['Jurusan'];
            $vJenis_Kelamin = $data['Jenis_Kelamin'];
            $vPw = $data['Pw'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($conn, "DELETE FROM tbl_mahasiswa WHERE NIM='$_GET[id]'");
        if ($hapus) {
            echo "<script>
            alert('Hapus berhasil');
            document.location='mahasiswabck.php';
            </script>";
        }
    }
}
$sql = 'SELECT * FROM tbl_mahasiswa';
$mahasiswa = mysqli_query($conn, $sql);
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

                                        <a href="profile.php" class="btn-outline-primary text-center" > MORE ADMIN!</a>
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
                                    <div class="container-fluid">

                                        <!-- Page Heading -->
                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                            <h1 class="h3 mb-0 text-gray-800">DATA MAHASISWA</h1>
                                        </div>

                                        <!-- Content Row -->

                                        <div class="row">
                                            <!-- Content1 -->
                                            <div class="col-xl-12 col-lg-7">
                                                <div class="card shadow mb-4">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-success text-center">DATA MAHASISWA</h6>
                                                    </div>
                                                    <!-- form -->
                                                    <div class="container mt-3">
                                                        <div class="card">
                                                            <div class="card-header mb-3">
                                                                INPUT DATA MAHASISWA
                                                            </div>
                                                            <div class="card-body">
                                                                <form method="post" action="" enctype="multipart/form-data">
                                                                    <div class="form-group ">
                                                                        <label>NIM</label>
                                                                        <input type="text" name="NIM" value="<?= @$vNIM ?>" class="form-control" placeholder="Input NIM" required>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label>NAMA</label>
                                                                        <input type="text" name="Nama" value="<?= @$vNama ?>" class="form-control" placeholder="Input NAMA " required>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label>NO TELPON</label>
                                                                        <input type="text" name="No_Telpon" value="<?= @$vNo ?>" class="form-control" placeholder="Input NO TELPON" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>JURUSAN</label>
                                                                        <select class="form-control" name="Jurusan">
                                                                            <option value="<?= @$vJurusan ?>"><?= @$vJurusan ?></option>
                                                                            <option value="S1 ILMU KOMPUTER">S1 ILMU KOMPUTER</option>
                                                                            <option value="DKV">DKV</option>
                                                                            <option value="HUKUM">HUKUM</option>
                                                                            <option value="GIZI">GIZI</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>JENIS KELAMIN</label>
                                                                        <select class="form-control" name="Jenis_Kelamin">
                                                                            <option value="<?= @$vJenis_Kelamin ?>"><?= @$vJenis_Kelamin ?></option>
                                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>ALAMAT</label>
                                                                        <textarea class="form-control" name="Alamat" placeholder="ALAMAT ANDA" required><?= @$vAlamat ?></textarea>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label>Password</label>
                                                                        <input type="Password" name="Pw" value="<?= @$vPw ?>" class="form-control" placeholder="Input Password" required>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                                                                    <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
                                                                </form>
                                                            </div>
                                                            <!-- end -->

                                                            <!-- Card Body -->
                                                            <div class="card-body">

                                                                <table class="table table-hover ">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">NIM</th>
                                                                            <th scope="col">NAMA </th>
                                                                            <th scope="col">JENIS KELAMIN </th>
                                                                            <th scope="col">ALAMAT</th>
                                                                            <th scope="col">No. TELPON</th>
                                                                            <th scope="col">JURUSAN</th>
                                                                            <th scope="col">ACTION</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        while ($data = mysqli_fetch_object($mahasiswa)) {

                                                                            ?>
                                                                            <tr>
                                                                                <th><?= $data->NIM ?></th>
                                                                                <td><?= $data->Nama ?></td>
                                                                                <td><?= $data->Jenis_Kelamin ?></td>
                                                                                <td><?= $data->Alamat ?></td>
                                                                                <td><?= $data->No_Telpon ?></td>
                                                                                <td><?= $data->Jurusan ?></td>
                                                                                <td>
                                                                                    <a href="mahasiswabck.php?hal=edit&id=<?= $data->NIM ?>" class="btn btn-outline-secondary">Edit</a>
                                                                                    <a href="mahasiswabck.php?hal=hapus&id=<?= $data->NIM ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini??')" class="btn btn-danger">Hapus</a>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
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