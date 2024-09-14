<?php include "header.php"; ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Home')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Ruang</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <div class="card card-warning card-outline">
                <div class="card-header">
                  <h3 class="card-title text-primary">RUANG : <?= $ruang->ruang ?> </h3>
                </div>
                <div class="card-body">
                  # Anda dapat mencari semua dokumen yang tersimpan dalam ruangan ini.
                </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title text-primary"> # List Dokumen</h3>
                   <div class="card-tools">
                            <button type="button" class="btn btn-tool text-primary" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <a href="<?= base_url('Home')?>" class="btn btn-tool text-primary" >
                                <i class="fas fa-times"></i>
                            </a>
                    </div>
                </div>
                <div class="card-body">
                  <table id="table_kirim" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nomor Doc</th>
                        <th>Nama Doc</th>
                        <th>Deskripsi</th>
                        <th style="width:18%">Menu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($arsip)){ 
                         foreach($arsip as $l){?>
                        <tr>
                          <td>
                          <?php if ($this->session->userdata('status')== 'login'){ ?>
                            <a href="<?= base_url('Home/arsip/'.$l->id.'/'.$l->no_arsip)?>" >
                              <?= $l->no_arsip ?>
                            </a>
                          <?php } else {?>
                            <a href="javascript:void(0)" onclick="pesan()" >
                              <?= $l->no_arsip ?>
                            </a>
                            <?php } ?>
                          </td>
                          <td><?= $l->nama?></td>
                          <td><?= $l->deskripsi?></td>
                          <td>
                            <?php if ($this->session->userdata('status')== 'login'){ ?>
                            <a href="<?= base_url('Home/arsip/'.$l->id.'/'.$l->no_arsip)?>" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> </a>
                            <button class="btn btn-outline-warning btn-sm btn-lokasi"
                            data-ruang ="<?= $l->ruang ?>"
                            data-rak = "<?= $l->rak ?>"
                            data-box = "<?= $l->box ?>"
                            data-map = "<?= $l->map ?>"><i class="fas fa-box"></i> Lokasi</button>
                            <?php } else {?>
                            <button onclick="pesan()" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> </button>
                            <button class="btn btn-outline-warning btn-sm btn-lokasi"
                            data-ruang ="<?= $l->ruang ?>"
                            data-rak = "<?= $l->rak ?>"
                            data-box = "<?= $l->box ?>"
                            data-map = "<?= $l->map ?>"><i class="fas fa-box"></i> Lokasi</button>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php } } else {?>
                        <tr>
                          <td colspan="4" class="text-center">KOSONG</td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
            </div>
            <div class="col-md-3">
              <div class="card card-warning card-outline">
                <div class="card-body">
                  <img src="<?= base_url('')?>upload/qrcode/<?= $ruang->qrcode?>" class="img-fluid mb-3" alt="<?= $ruang->qrcode?>">
                  <h3 class="text-center"><?= $ruang->kode ?></h3>
                  <hr>
                  <a href="<?= base_url('Home/cetak_ruang/'.$ruang->id)?>" target="_blank" class="btn btn-warning btn-sm btn-block">Cetak</a>
                  <span>Anda dapat menempelkan QRCODE ini di Pintu Ruangan, untuk akses pencarian cepat.</span>
                </div>
              </div>
            </div>
          </div>
            
        </div>
    </section>
</div>
<!-- Modal lihat lokasi -->
<div class="modal fade" id="lokasi-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Lokasi Arsip</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                  <table class="table">
                    <tr>
                      <th>Ruang </th>
                      <td><input type="text" class="form-control" id="ruang" readonly> </td>
                    </tr>
                    <tr>
                      <th>Rak </th>
                      <td><input type="text" class="form-control" id="rak" readonly> </td>
                    </tr>
                    <tr>
                      <th>Box </th>
                      <td><input type="text" class="form-control" id="box" readonly> </td>
                    </tr>
                    <tr>
                      <th>Map </th>
                      <td><input type="text" class="form-control" id="map" readonly> </td>
                    </tr>
                  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
<!-- end modal -->
 <!-- jQuery -->
 <script src="<?php echo base_url()?>/assets/plugins/jquery/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
    
      $('#table_kirim').DataTable({
          order: [[0, 'asc']],
          responsive: true,
          lengthChange: false,
          autoWidth: false,
      });

        // get lokasi
    $('.btn-lokasi').on('click',function(){
            // get data from button edit
            const ruang = $(this).data('ruang');
            const rak = $(this).data('rak');
            const box = $(this).data('box');
            const map = $(this).data('map');
            // Set data to Form Edit
            $('#ruang').val(ruang);
            $('#rak').val(rak);
            $('#box').val(box);
            $('#map').val(map);
            // Call Modal Edit
            $('#lokasi-modal').modal('show');
        });
      
    
    })
  </script>
<?php include "footer.php"; ?>