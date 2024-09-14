<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php if($list->foto == ""){?>
                    <img class="profile-user-img img-fluid img-rounded"
                       src="<?= base_url('upload/user/default.png')?>"
                       alt="<?= $list->nama_user ?>">
                  <?php }else { ?>
                    <img class="profile-user-img img-fluid img-rounded"
                       src="<?= base_url('upload/user/'.$list->foto)?>"
                       alt="<?= $list->nama_user ?>">
                  <?php } ?>
                </div>

                <h3 class="profile-username text-center"><?= $list->nama_user ?></h3>

                <p class="text-muted text-center"><?= $list->role ?></p>
                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-block"><b>Ganti Foto</b></button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tentang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-key mr-1"></i> NIP</strong>

                <p class="text-muted">
                  <?= $list->nip ?>
                </p>

                <hr>

                <strong><i class="fas fa-tag mr-1"></i> Divisi</strong>

                <p class="text-muted"><?= $list->divisi ?></p>

                <hr>

                <strong><i class="fab fa-whatsapp mr-1"></i> Telp</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?= $list->telp ?></span>
                </p>

                <hr>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
            <form action="<?= base_url('Profil/update')?>" method="POST">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama lengkap</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama" value="<?= $list->nama_user?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Divisi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?= $list->divisi?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Telp / Whatsapp</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="telp" value="<?= $list->telp?>" required>
                        </div>
                      </div>
                      <label for=""># Sistem</label>
                      <hr>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" id="username" value="<?= $list->username?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password_baru"  plcaeholder="password.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password" id="password" plcaeholder="password.." required>
                        </div>
                      </div>
                  
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              <div class="card-footer">
              <button type="submit" class="btn btn-danger float-right">Update</button>
              </div>
            </div>
            <!-- /.card -->
            </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="Profil/update_foto" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ganti foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                  <label for="">Upload Foto</label>
                  <div class="custom-file">
                    <input type="file" name="foto" class="custom-file-input" id="customFile" accept=".jpg, .jpeg, .png" required>
                    <label class="custom-file-label" for="customFile">Pilih file</label>
                  </div>
                </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    bsCustomFileInput.init();
    // cek username
    $('#username').change(function(){
      var username = $(this).val()
      // Kirim data ke controller MyTable dengan AJAX
      $.ajax({
        url: "<?php echo base_url('Profil/c_username'); ?>",
        type: "POST",
        dataType: "JSON",
        data: {username:username},
          success: function(data) {
            if (data == true) {
                Swal.fire('USERNAME SUDAH ADA','silahkan input dengan username yang lain!','error');
                $('#username').val('');
            } 
          }
        });
    });
    // cek password
    $('#password').change(function(){
      var password = $(this).val()
      // Kirim data ke controller MyTable dengan AJAX
      $.ajax({
        url: "<?php echo base_url('Profil/c_pass'); ?>",
        type: "POST",
        dataType: "JSON",
        data: {password:password},
          success: function(data) {
            if (data == true) {
                Swal.fire('Password Salah','silahkan masukan password lama dengan benar!','error');
                $('#password').val('');
            } 
          }
        });
    });
  });
</script>