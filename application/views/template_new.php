<?php
$list	= $this->db->query("SELECT * from tb_setting ")->row();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $list->title ?> | <?= $list->perusahaan ?></title>
  <link rel="shortcut icon" href="<?= base_url('upload/setting/'.$list->icon) ?>" />
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
  <!-- sweetalert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<?php
  if ($this->session->flashdata('type')) { ?>
    <script>
    var type = "<?= $this->session->flashdata('type'); ?>"
    var title = "<?= $this->session->flashdata('title'); ?>"
    var text = "<?= $this->session->flashdata('text'); ?>"
    Swal.fire(title,text,type)
    </script>
  <?php } ?>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('')?>" class="nav-link">Halaman Utama</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('')?>" class="brand-link">
      <img src="<?= base_url('upload/setting/'.$list->icon) ?>" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-light"><?= $list->title ?></span>
    </a>

    <!-- Sidebar -->
    <?php $this->load->view($sidebar) ?>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- isi konten -->
    <?= $contents ?>
    <!-- end konten -->
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url('') ?>"><?= $list->title ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url()?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url()?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- table -->
<script>
  // fungsi tabel
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  // fungsi logout
  function logout(){
    let timerInterval;
    Swal.fire({
      title: 'Konfirmasi',
      text: 'Apakah anda yakin ingin keluar aplikasi?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yakin',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          title: 'Berhasil!',
          text: 'Berhasil Logout!',
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
        }).then(() => {
          window.location.href = '<?= base_url('Profil/logout') ?>';

        })
      }
    })
  }
  // pesan
  function pesan_demo()
  {
    Swal.fire({
          title: 'No Akses!',
          text: 'Anda tidak punya akses ini di halaman demo, >:< ',
          icon: 'info',
          showConfirmButton: true,
        })
  }
</script>
</body>
</html>
