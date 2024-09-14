<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title text-primary"><i class="fas fa-chart-pie text-primary"></i> <strong>List peminjaman Document</strong></h3>
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
                    <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><li class="fas fa-plus"></li> Pinjam Dokumen</button>
                    <br>
                    <hr>
                    <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr class="text-center">
                                <th style="width:5%">#</th>
                                <th>Nomor</th>
                                <th>Nama Document</th>
                                <th>Tgl Ambil</th>
                                <th>Tgl Kembali</th>
                                <th>Status</th>
                                <th>Menu</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $no = 0;
                                foreach($pinjam as $t):
                                $no++
                            ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td><a href="<?= base_url('Home/arsip/'.$t->id_arsip.'/'.$t->no_arsip); ?>" target="_blank"><?= $t->no_arsip ?></a></td>
                              <td><?= $t->nama ?></td>
                              <td class="text-center"><?= $t->tgl_pinjam ?></td>
                              <td class="text-center"><?= $t->tgl_kembali ?></td>
                              <td class="text-center"><?= status_pinjam($t->status) ?></td>
                              <td class="text-center">
                                <?php if($t->status == '0'){ ?>
                                  <button  class="btn btn-outline-danger btn-sm hapus" data-id="<?= $t->id ?>" title="Cancel"> <i class="fas fa-trash"></i></button>
                              <?php } ?>
                              <button  class="btn btn-outline-danger btn-sm hapus <?= ($t->status == '5') ? '' : 'd-none'?>" data-id="<?= $t->id ?>" title="Cancel"> <i class="fas fa-trash"></i></button>
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
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
    <form action="<?=base_url('karyawan/Pinjam/add');?>" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Dokumen Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
              <label for="Divisi">Pilih Dokumen</label>
              <select name="dokumen" class="form-control" required>
                <option value="">- Pilih Dokumen -</option>
                <?php foreach($dokumen as $d) : ?>
                  <option value="<?= $d->id ?>"><?= $d->nama ?></option>
                <?php endforeach ?>
              </select>
        </div>
       <!-- Date -->
        <div class="form-group">
          <label>Tanggal ambil</label>
            <div class="input-group date" id="tgl_ambil" data-target-input="nearest">
              <input type="text" name="tgl_pinjam" class="form-control datetimepicker-input" data-target="#tgl_ambil" required>
              <div class="input-group-append" data-target="#tgl_ambil" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
        </div>
        <div class="form-group">
          <label>Tanggal Kembali</label>
            <div class="input-group date" id="tgl_kembali" data-target-input="nearest">
              <input type="text" name="tgl_kembali" class="form-control datetimepicker-input" data-target="#tgl_kembali" required>
              <div class="input-group-append" data-target="#tgl_kembali" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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
<!-- jQuery -->
<script src="<?php echo base_url()?>/assets/plugins/jquery/jquery.min.js"></script>
<script>
  $(document).ready(function(){
     //Initialize Select2 Elements
     $('.select2').select2()

      
  });
</script>
<!-- end modal -->
<script type="text/javascript">
  $(document).ready(function() {
     //Date picker
     $('#tgl_ambil').datetimepicker({
        format: 'L',
        format: 'YYYY-MM-DD'
    });
    //Date picker
    $('#tgl_kembali').datetimepicker({
        format: 'L',
        format: 'YYYY-MM-DD'
    });
    // button hapus
    $('.hapus').click(function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
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
        location.href = "<?= base_url('karyawan/Pinjam/hapus/') ?>"+id;
      }
    })
  });

  });
</script>
