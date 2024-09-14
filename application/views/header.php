<?php
$list	= $this->db->query("SELECT * from tb_setting ")->row();
$id_user  = $this->session->userdata('id');
$user = $this->db->query("SELECT * from tb_user where id ='$id_user'")->row();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $list->title ?></title>

  <link rel="shortcut icon" href="<?= base_url('upload/setting/'.$list->icon) ?>" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
 
  <!-- tambahan untuk plugin -->
  <!-- sweetalert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
    
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
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-primary ">
    <div class="container">
      <a href="<?php echo base_url('')?>" class="navbar-brand">
        <img src="<?= base_url('upload/setting/'.$list->icon) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-white text-white"><?= $list->title ?></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
       

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        
        <li class="nav-item">
          <?php if($this->session->userdata('status') == 'login') {?>
            <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">
            <?php if($user->foto == ""){?>
              <img src="<?= base_url('upload/user/default.png') ?>" alt="arsip" class="brand-image img-circle elevation-3">
            <?php }else { ?>
              <img src="<?= base_url('upload/user/'.$user->foto) ?>" alt="arsip" class="brand-image img-circle elevation-3">
            <?php } ?>	</span>
            <?= $this->session->userdata('nama_user') ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li>
                <?php
                if($this->session->userdata('role') == '1'){?>
                <a href="<?= base_url('admin/Dashboard')?>" class="dropdown-item">Dashboard</a>
                <?php }else if($this->session->userdata('role') == '2'){?>
                <a href="<?= base_url('karyawan/Dashboard')?>" class="dropdown-item">Dashboard</a>
                <?php } else { ?>
                  <a href="<?= base_url('petugas/Dashboard')?>" class="dropdown-item">Dashboard</a>
                  <?php } ?>
              </li>
              <li><a href="<?= base_url('Profil');?>" class="dropdown-item">Profil</a></li>
              <li class="dropdown-divider"></li>
              <li><a href="javascript:void(0)" onclick="logout()" class="dropdown-item">Logout</a></li>
            </ul>
          </li>
          <?php }else {?>
            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#login"><li class="fas fa-arrow-right"></li> Login</button>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  <!-- Modal login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <img src="<?= base_url('upload/setting/'.$list->logo) ?>" alt="logo" style="max-height: 50px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="pt-3" action="<?= base_url('Home/proses_login') ?>" method="post">
      <div class="modal-body text-center">
      <a href="#" class="h1 text-center " style="text-align:center;"><b>LOGIN</b></a>
		<h4>user login administrator/administrator </h4>
      <div class="input-group mb-3 mt-5">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="hidden" name="page" value="<?= $this->uri->uri_string(); ?>" class="form-control form-control-lg" >
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="hidden" name="token" value="<?= $token ?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>