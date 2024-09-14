<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title text-primary"><i class="fas fa-chart-pie text-primary"></i> <strong>List Divisi</strong></h3>
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
                                <th style="width:20%">Divisi</th>
                                <th style="width:25%">Deskripsi</th>
                                <th style="width:15%">Status</th>
                                <th style="width:20%">Menu</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $no = 0;
                                foreach($divisi as $t):
                                $no++
                            ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td><?= $t->divisi ?></td>
                              <td><?= $t->deskripsi ?></td>
                              <td class="text-center"><?= status_aktif($t->status) ?></td>
                              <td class="text-center">
                                <button class="btn btn-outline-warning btn-sm btn-edit" data-id ="<?= $t->id ?>"
                                data-divisi ="<?= $t->divisi ?>"
                                data-deskripsi ="<?= $t->deskripsi ?>"
                                data-status = "<?= $t->status ?>"> <i class="fas fa-edit"></i></button>
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
    <form action="Divisi/add" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Divisi Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="Divisi">Nama Divisi</label>
            <input type="text" name="divisi" class="form-control" id="Divisi" placeholder="Divisi" required>
        </div>
        <div class="form-group">
            <label for="Divisi">Deskripsi</label>
            <textarea name="deskripsi" id="" cols="1" rows="3" class="form-control" placeholder="deskripsi divisi...."></textarea>
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
<!-- Modal edit -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
    <form action="Divisi/update" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Divisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="Divisi">Nama Divisi</label>
            <input type="hidden" name="id_divisi" class="form-control" id="id_divisi" placeholder="Divisi" required>
            <input type="text" name="divisi" class="form-control" id="divisi" placeholder="Divisi" required>
        </div>
        <div class="form-group">
            <label for="Divisi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="1" rows="3" class="form-control" placeholder="deskripsi divisi...."></textarea>
        </div>
        <div class="form-group">
            <label for="Divisi">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="1">AKTIF</option>
              <option value="0">NON-AKTIF</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><li class="fas fa-save"></li> Update</button>
      </div>
      </form>
    </div>
    
  </div>
</div>
<!-- end modal -->
<script type="text/javascript">
  $(document).ready(function() {
    
    // get Edit Product
    $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const divisi = $(this).data('divisi');
            const deskripsi = $(this).data('deskripsi');
            const status = $(this).data('status');
            // Set data to Form Edit
            $('#id_divisi').val(id);
            $('#divisi').val(divisi);
            $('#status').val(status);
            $('#deskripsi').val(deskripsi);
            // Call Modal Edit
            $('#edit-modal').modal('show');
        });
    
  });
</script>