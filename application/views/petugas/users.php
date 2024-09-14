<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title text-primary"><i class="fas fa-chart-pie text-primary"></i> <strong>List Users</strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-primary" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-tool text-primary" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                    <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><li class="fas fa-plus"></li> Tambah</button>
                    <br>
                    <hr>
                    <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr class="text-center">
                                <th style="width:5%">#</th>
                                <th style="width:20%">Nama Lengkap</th>
                                <th style="width:15%">Telp</th>
                                <th style="width:15%">Akses</th>
                                <th style="width:15%">Status</th>
                                <th style="width:9%">Menu</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $no = 0;
                                foreach($users as $t):
                                $no++
                            ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td>
                              <div class="user-block">
                                  <?php if($t->foto == ""){?>
                                      <img class="img-circle img-bordered-sm"
                                        src="<?= base_url('upload/user/default.png')?>"
                                        alt="<?= $t->nama_user ?>">
                                    <?php }else { ?>
                                      <img class="img-circle img-bordered-sm" src="<?= base_url('upload/user/'.$t->foto)?>" alt="<?= $t->nama_user ?>">
                                    <?php } ?>
                                  <span class="username">
                                    <a href="<?= base_url('petugas/Users/detail/'.$t->id); ?>"><?= $t->nama_user ?></a>
                                  </span>
                                  <span class="description">NIP : <?= $t->nip ?></span>
                                </div></td>
                              <td class="text-center"><?= $t->telp ?></td>
                              <td class="text-center"><?= $t->role ?></td>
                              <td class="text-center"><?= status_aktif($t->status) ?></td>
                              <td class="text-right">
                                <a href="<?= base_url('petugas/Users/detail/'.$t->id); ?>" class="btn btn-outline-primary btn-sm "> <i class="fas fa-eye"></i></a>
                               
                              </td>
                            </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    
    <div class="modal-content">
    <form action="Users/add" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah User Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="Divisi">NIP</label>
              <input type="text" name="nip" class="form-control" id="nip" placeholder="Nip.." required>
            </div>
            <div class="form-group">
              <label for="Divisi">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="nama lengkap.." required>
            </div>
            <div class="form-group">
                <label for="Divisi">Divisi</label>
                <select name="divisi" id="divisi" class="form-control" required>
                  <option value="">- Pilih divisi -</option>
                  <?php foreach($divisi as $d): ?>
                    <option value="<?= $d->id ?>"><?= $d->divisi ?></option>
                  <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
              <label for="telp">No Telp</label>
              <input type="number" name="telp" class="form-control" placeholder="no telp /whatsapp..." required>
            </div>
          </div>
          <div class="col-md-6">
            
            <div class="form-group">
                <label for="Divisi">Role Akses</label>
                <select name="role" id="role" class="form-control" required>
                  <option value="">- Pilih Role Akses -</option>
                  <?php foreach($role as $d): ?>
                    <option value="<?= $d->id ?>"><?= $d->role ?></option>
                  <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
              <label for="telp">Username </label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Username..." required>
            </div>
            <div class="form-group">
              <label for="telp">Password </label>
              <input type="password" name="password" class="form-control" placeholder="password..." required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><li class="fas fa-save"></li> Simpan</button>
      </div>
      </form>
    </div>
    
  </div>
</div>
<!-- end modal -->
<script type="text/javascript">
  $(document).ready(function() {
    
  // cek username
  $('#username').change(function(){
    var username = $(this).val()
    // Kirim data ke controller MyTable dengan AJAX
     $.ajax({
      url: "<?php echo base_url('admin/Users/cek_username') ?>",
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
   
  });
</script>