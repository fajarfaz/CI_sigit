<?php
$list	= $this->db->query("SELECT * from tb_setting ")->row();
?>
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url('') ?>"><?= $list->title ?></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>
<!-- tambahan untuk pluggin -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- InputMask -->
<script src="<?php echo base_url()?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
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
<script>
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
  function pesan()
  {
    Swal.fire({
          title: 'No Akses!',
          text: 'Anda tidak punya akses ini, Silahkan Login terlebih dahulu !',
          icon: 'error',
          showConfirmButton: true,
        })
  }
  
</script>
   
</body>
</html>