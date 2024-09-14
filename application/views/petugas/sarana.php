<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-primary  card-tabs">
                  <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                      <li class="pt-2 px-3">
                        <h3 class="card-title">Tempat Simpan :</h3>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" id="ruang-tab" data-toggle="pill" href="#ruang" role="tab" aria-controls="custom-tabs-two-home" aria-selected="false">Ruang</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="rak-tab" data-toggle="pill" href="#rak" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Rak</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " id="box-tab" data-toggle="pill" href="#box" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="true">Box</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="map-tab" data-toggle="pill" href="#map" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Map</a>
                      </li>
                    </ul>
                    
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                      <div class="tab-pane fade active show" id="ruang" role="tabpanel" aria-labelledby="ruang-tab">
                        <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#tambah-ruang"><li class="fas fa-plus"></li> Tambah</button>
                        <br>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                <tr class="text-center">
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">Kode</th>
                                    <th style="width:25%">Nama Ruang</th>
                                    <th style="width:15%">Status</th>
                                    <th style="width:20%">Menu</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $no = 0;
                                    foreach($ruang as $t):
                                    $no++
                                ?>
                                <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $t->kode ?></td>
                                  <td><?= $t->ruang ?></td>
                                  <td class="text-center"><?= status_aktif($t->status) ?></td>
                                  <td class="text-center">
                                    <a href="<?= base_url('Home/ruang/'.$t->id)?>" target="_blank" class="btn btn-outline-primary btn-sm" title="lihat isinya"><i class="fas fa-th-large"></i></a>
                                    <a href="<?= base_url('Home/cetak_ruang/'.$t->id)?>" target="_blank" class="btn btn-outline-warning btn-sm" title="cetak barcode"><i class="fas fa-qrcode"></i></a>
                                    <button class="btn btn-outline-danger btn-sm hapus-ruang" data-ruang ="<?= $t->id ?>"> <i class="fas fa-trash"></i></button>
                                  </td>
                                </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                      </div>
                      <div class="tab-pane fade" id="rak" role="tabpanel" aria-labelledby="rak-tab">
                        <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#tambah-rak"><li class="fas fa-plus"></li> Tambah</button>
                        <br>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                <tr class="text-center">
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">Kode</th>
                                    <th style="width:25%">Nama Rak</th>
                                    <th style="width:15%">Status</th>
                                    <th style="width:20%">Menu</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $no = 0;
                                    foreach($rak as $t):
                                    $no++
                                ?>
                                <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $t->kode ?></td>
                                  <td><?= $t->rak ?></td>
                                  <td class="text-center"><?= status_aktif($t->status) ?></td>
                                  <td class="text-center">
                                  <a href="<?= base_url('Home/rak/'.$t->id)?>" target="_blank" class="btn btn-outline-primary btn-sm" title="lihat isinya"><i class="fas fa-th-large"></i></a>
                                    <a href="<?= base_url('Home/cetak_rak/'.$t->id)?>" target="_blank" class="btn btn-outline-warning btn-sm" title="cetak barcode"><i class="fas fa-qrcode"></i></a>
                                    <button class="btn btn-outline-danger btn-sm hapus-rak" data-rak ="<?= $t->id ?>"> <i class="fas fa-trash"></i></button>
                                  </td>
                                </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                      </div>
                      <div class="tab-pane fade " id="box" role="tabpanel" aria-labelledby="box-tab">
                        <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#tambah-box"><li class="fas fa-plus"></li> Tambah</button>
                        <br>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                <tr class="text-center">
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">Kode</th>
                                    <th style="width:25%">Nama Box</th>
                                    <th style="width:15%">Status</th>
                                    <th style="width:20%">Menu</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $no = 0;
                                    foreach($box as $t):
                                    $no++
                                ?>
                                <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $t->kode ?></td>
                                  <td><?= $t->box ?></td>
                                  <td class="text-center"><?= status_aktif($t->status) ?></td>
                                  <td class="text-center">
                                  <a href="<?= base_url('Home/box/'.$t->id)?>" target="_blank" class="btn btn-outline-primary btn-sm" title="lihat isinya"><i class="fas fa-th-large"></i></a>
                                    <a href="<?= base_url('Home/cetak_box/'.$t->id)?>" target="_blank" class="btn btn-outline-warning btn-sm" title="cetak barcode"><i class="fas fa-qrcode"></i></a>
                                    <button class="btn btn-outline-danger btn-sm hapus-box" data-box ="<?= $t->id ?>"> <i class="fas fa-trash"></i></button>
                                  </td>
                                </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                      </div>
                      <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                        <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#tambah-map"><li class="fas fa-plus"></li> Tambah</button>
                        <br>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr class="text-center">
                                  <th style="width:5%">#</th>
                                  <th style="width:20%">Kode</th>
                                  <th style="width:25%">Nama map</th>
                                  <th style="width:15%">Status</th>
                                  <th style="width:20%">Menu</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                  $no = 0;
                                  foreach($map as $t):
                                  $no++
                              ?>
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= $t->kode ?></td>
                                <td><?= $t->map ?></td>
                                <td class="text-center"><?= status_aktif($t->status) ?></td>
                                <td class="text-center">
                                <a href="<?= base_url('Home/map/'.$t->id)?>" target="_blank" class="btn btn-outline-primary btn-sm" title="lihat isinya"><i class="fas fa-th-large"></i></a>
                                    <a href="<?= base_url('Home/cetak_map/'.$t->id)?>" target="_blank" class="btn btn-outline-warning btn-sm" title="cetak barcode"><i class="fas fa-qrcode"></i></a>
                                  <button class="btn btn-outline-danger btn-sm hapus-map" data-map ="<?= $t->id ?>"> <i class="fas fa-trash"></i></button>
                                </td>
                              </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal tambah ruang -->
<div class="modal fade" id="tambah-ruang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
    <form action="Sarana/add_ruang" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Ruang Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="Divisi">Kode Ruang</label>
            <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode Ruang.." required>
        </div>
        <div class="form-group">
            <label for="Divisi">Nama Ruang</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Ruang.." required>
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
<!-- Modal tambah rak -->
<div class="modal fade" id="tambah-rak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
    <form action="Sarana/add_rak" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Rak Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="Divisi">Kode Rak</label>
            <input type="text" name="kode" class="form-control" id="kode_rak" placeholder="Kode Rak.." required>
        </div>
        <div class="form-group">
            <label for="Divisi">Nama Rak</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Rak.." required>
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
<!-- Modal tambah box -->
<div class="modal fade" id="tambah-box" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
    <form action="Sarana/add_box" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah box Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="Divisi">Kode box</label>
            <input type="text" name="kode" class="form-control" id="kode_box" placeholder="Kode box.." required>
        </div>
        <div class="form-group">
            <label for="Divisi">Nama box</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama box.." required>
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
<!-- Modal tambah map -->
<div class="modal fade" id="tambah-map" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
    <form action="Sarana/add_map" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah map Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="Divisi">Kode map</label>
            <input type="text" name="kode" class="form-control" id="kode_map" placeholder="Kode map.." required>
        </div>
        <div class="form-group">
            <label for="Divisi">Nama map</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama map.." required>
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
    // button hapus ruang
    $('.hapus-ruang').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-ruang');
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data yang di hapus tidak bisa dikembalikan lagi.",
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
          confirmButtonText: 'Yakin'
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = "<?= base_url('petugas/Sarana/hapus_ruang/') ?>"+id;
          }
        })
    });
    // button hapus rak
    $('.hapus-rak').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-rak');
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data yang di hapus tidak bisa dikembalikan lagi.",
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
          confirmButtonText: 'Yakin'
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = "<?= base_url('petugas/Sarana/hapus_rak/') ?>"+id;
          }
        })
    });
    // button hapus box
    $('.hapus-box').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-box');
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data yang di hapus tidak bisa dikembalikan lagi.",
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
          confirmButtonText: 'Yakin'
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = "<?= base_url('petugas/Sarana/hapus_box/') ?>"+id;
          }
        })
    });
    // button hapus map
    $('.hapus-map').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-map');
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data yang di hapus tidak bisa dikembalikan lagi.",
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
          confirmButtonText: 'Yakin'
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = "<?= base_url('petugas/Sarana/hapus_map/') ?>"+id;
          }
        })
    });
    // cek kode ruang
    $('#kode').change(function(){
      var kode = $(this).val()
      // Kirim data ke controller MyTable dengan AJAX
      $.ajax({
        url: "<?php echo base_url('petugas/Sarana/c_ruang') ?>",
        type: "POST",
        dataType: "JSON",
        data: {kode:kode},
        success: function(data) {
          if (data == true) {
            Swal.fire('KODE SUDAH ADA','silahkan input dengan kode yang lain!','error');
            $('#kode').val('');
          } 
        }
      });
    })
    // cek kode kode_rak
    $('#kode_rak').change(function(){
      var kode = $(this).val()
      // Kirim data ke controller MyTable dengan AJAX
      $.ajax({
        url: "<?php echo base_url('petugas/Sarana/c_rak') ?>",
        type: "POST",
        dataType: "JSON",
        data: {kode:kode},
        success: function(data) {
          if (data == true) {
            Swal.fire('KODE SUDAH ADA','silahkan input dengan kode yang lain!','error');
            $('#kode_rak').val('');
          } 
        }
      });
    })
    // cek kode box
    $('#kode_box').change(function(){
      var kode = $(this).val()
      // Kirim data ke controller MyTable dengan AJAX
      $.ajax({
        url: "<?php echo base_url('petugas/Sarana/c_box') ?>",
        type: "POST",
        dataType: "JSON",
        data: {kode:kode},
        success: function(data) {
          if (data == true) {
            Swal.fire('KODE SUDAH ADA','silahkan input dengan kode yang lain!','error');
            $('#kode_box').val('');
          } 
        }
      });
    })
    // cek kode map
    $('#kode_map').change(function(){
      var kode = $(this).val()
      // Kirim data ke controller MyTable dengan AJAX
      $.ajax({
        url: "<?php echo base_url('petugas/Sarana/c_map') ?>",
        type: "POST",
        dataType: "JSON",
        data: {kode:kode},
        success: function(data) {
          if (data == true) {
            Swal.fire('KODE SUDAH ADA','silahkan input dengan kode yang lain!','error');
            $('#kode_map').val('');
          } 
        }
      });
    })
  });
</script>