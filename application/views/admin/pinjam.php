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
                   
                    <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr class="text-center">
                                <th style="width:5%">#</th>
                                <th>Nomor</th>
                                <th>Nama Document</th>
                                <th>Tgl Ambil</th>
                                <th>Tgl Kembali</th>
                                <th>Peminjam</th>
                                <th>Status</th>
                                <th style="width:10%">Menu</th>
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
                              <td>
                                <a href="<?= base_url('Home/arsip/'.$t->id_arsip.'/'.$t->no_arsip); ?>" target="_blank"><?= $t->no_arsip ?></a></td>
                              <td><?= $t->nama ?></td>
                              <td class="text-center"><?= $t->tgl_pinjam ?></td>
                              <td class="text-center"><?= $t->tgl_kembali ?></td>
                              <td class="text-center"><?= $t->nama_user ?></td>
                              <td class="text-center"><?= status_pinjam($t->status) ?></td>
                              <td class="text-right">
                                <?php if($t->status == 0){ ?>
                                  <a href="<?= base_url('admin/Pinjam/approve/'.$t->id) ?>"  class="btn btn-outline-success btn-sm " title="Approve"> <i class="fas fa-check"></i></a>
                                <a href="<?= base_url('admin/Pinjam/tolak/'.$t->id) ?>"  class="btn btn-outline-danger btn-sm " title="Tolak"> <i class="fas fa-times-circle"></i></a>
                                <?php } else {?>
                                  <a href="<?= base_url('Home/arsip/'.$t->id_arsip.'/'.$t->no_arsip); ?>"  class="btn btn-outline-info btn-sm " title="detail"> <i class="fas fa-eye"></i></a>
                                  <a href="<?= base_url('admin/Pinjam/kembali/'.$t->id) ?>"  class="btn btn-outline-warning btn-sm <?= (($t->status == "5") || ($t->status == "2")) ? 'd-none' : '' ?>" title="dikembalikan"> <i class="fas fa-handshake"></i></a>
                                <?php } ?>
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
    <form action="Arsip/add" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Dokumen Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="Divisi">Nomor Dokumen</label>
              <input type="text" name="no_dokumen" class="form-control" id="no_dokumen" placeholder="no_dokumen..." required>
            </div>
            <div class="form-group">
              <label for="Divisi">Nama Dokumen</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama dokumen..." required>
            </div>
            <div class="form-group">
              <label for="Deskripsi">Deskripsi</label>
              <textarea name="deskripsi" id="" cols="1" rows="3" class="form-control" placeholder="Deskripsi dokumen"></textarea>
            </div>
            
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="Deskripsi">Kategori</label>
              <select name="kategori" id="kategori" class="form-control select2" required>
                <option value="">- Pilih Kategori -</option>
                <?php foreach($kategori as $k): ?>
                  <option value="<?= $k->id ?>"> <?= $k->kategori ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="Deskripsi">Divisi</label>
              <select name="divisi" id="divisi" class="form-control select2" required>
                <option value="">- Pilih Divisi -</option>
                <?php foreach($divisi as $d): ?>
                  <option value="<?= $d->id ?>"> <?= $d->divisi ?></option>
                <?php endforeach; ?>
              </select>
            </div>
              <div class="form-group">
                <label for="">Upload File</label>
                <div class="custom-file">
                  <input type="file" name="arsip" class="custom-file-input" id="customFile" accept=".jpg, .jpeg, .png, .gif, .doc, .docx, .xls, .xlsx, .csv, .ppt, .pptx, .pdf">
                  <label class="custom-file-label" for="customFile">Pilih file</label>
                </div>
              </div>
          </div>
        </div>
        #Tempat Simpan :
        <hr>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Ruang</label>
              <select name="ruang" id="" class="form-control select2" required>
                <option value="">- Pilih ruang -</option>
                <?php foreach($ruang as $r) :?>
                  <option value="<?= $r->id ?>"><?= $r->ruang ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Rak</label>
              <select name="rak" id="" class="form-control select2" required>
                <option value="">- Pilih Rak -</option>
                <?php foreach($rak as $r) :?>
                  <option value="<?= $r->id ?>"><?= $r->rak ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Box</label>
              <select name="box" id="" class="form-control select2" required>
                <option value="">- Pilih Box -</option>
                <?php foreach($box as $r) :?>
                  <option value="<?= $r->id ?>"><?= $r->box ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Map</label>
              <select name="map" id="" class="form-control select2" required>
                <option value="">- Pilih Map -</option>
                <?php foreach($map as $r) :?>
                  <option value="<?= $r->id ?>"><?= $r->map ?></option>
                <?php endforeach ?>
              </select>
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
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- end modal -->
<script type="text/javascript">
  $(document).ready(function() {
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
        location.href = "<?= base_url('admin/Arsip/hapus/') ?>"+id;
      }
    })
  });
  // cek no dokumen
  $('#no_dokumen').change(function(){
      var no_dokumen = $(this).val()
      // Kirim data ke controller MyTable dengan AJAX
      $.ajax({
        url: "<?php echo base_url('admin/Arsip/cek_dokumen') ?>",
        type: "POST",
        dataType: "JSON",
        data: {no_dokumen:no_dokumen},
        success: function(data) {
          if (data == true) {
            Swal.fire('NOMOR SUDAH ADA','silahkan input dengan kode yang lain!','error');
            $('#no_dokumen').val('');
          } 
        }
      });
    })
  });
</script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
    function copyToClipboard(text) {
      var input = document.createElement('textarea');
        input.innerHTML = text;
        document.body.appendChild(input);
        input.select();
        var result = document.execCommand('copy');
        document.body.removeChild(input);
        alert("Link berhasil di copy");
        return result;
    }
</script>