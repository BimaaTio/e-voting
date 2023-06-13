<?php
session_start();
$title = $_GET['hal'];
require '../../config/functions.php';
if (!isset($_SESSION['logGuru'])) {
  header("Location:../../?bad=Silahkan Login Dahulu");
  exit;
}
$uid = $_SESSION['uid'];
$dataLogin = query("SELECT * FROM users WHERE uid = $uid")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../../assets/img/smk.png" type="image/x-icon">

  <?php if ($title == '') : ?>
    <title>E-Voting &mdash; Dashboard</title>
  <?php else : ?>
    <title>E-Voting &mdash; <?= ucwords(str_replace("-", " ", $title)) ?></title>
  <?php endif; ?>
  <!-- Custom fonts for this template-->
  <link href="../../assets/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../assets/template/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?hal=">
        <div class="sidebar-brand-icon">
          <img src="../../assets/img/smk.png" width="50" height="50" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">E-Voting</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="?hal=">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        MANAGE
      </div>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="?hal=votes">
          <i class="fas fa-fw fa-bullhorn"></i>
          <span>Vote</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?hal=data-vote">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>Data Vote</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
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
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $dataLogin['nama'] ?></span>
                <i class="fas fa-fw fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="?hal=profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php include 'config.php' ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Voting Rapat Penegas 2023</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik "Logout" dibawah jika kamu ingin logout.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../assets/js/script.js"></script>
  <script src="../../assets/template/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../assets/template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../assets/template/vendor/chart.js/Chart.min.js"></script>
  <script src="../../assets/template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../assets/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="../../assets/template/js/demo/chart-area-demo.js"></script>
  <script>
    $(document).ready(function() {
      $('#vote').DataTable({
        searching: true,
        dom: 'Lfrtip'
      });
      //Show data to modal
      $(document).on('click', 'a[data-role=editKandidat]', function() {
        const id = $(this).data('id');
        let nama = $.trim($('#' + id).children('td[data-target=nama]').text());
        let kelas = $.trim($('#' + id).children('td[data-target=kelas]').text());

        $('#id').val(id);
        $('#editNis').val(id);
        $('#editNama').val(nama);
        $('#editKelas').val(kelas);
        $('#editKandidat').modal('toggle');
      });
      // Show data to modal akun guru
      $(document).on('click', 'a[data-role=editAkun]', function() {
        const id = $(this).data('id');
        let nama = $.trim($('#' + id).children('td[data-target=nama]').text());
        let email = $.trim($('#' + id).children('td[data-target=email]').text());

        $('#id').val(id);
        $('#editName').val(nama);
        $('#editEmail').val(email);
        $('#editAkun').modal('toggle');
      });

    });
  </script>
</body>

</html>