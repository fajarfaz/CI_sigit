<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title text-primary"><i class="fas fa-chart-pie text-primary"></i> <strong>List Kategori</strong></h3>
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
                                <th>Kategori</th>
                                <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $no = 0;
                                foreach($kategori as $t):
                                $no++
                            ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td><?= $t->kategori ?></td>
                              <td class="text-center"><?= status_aktif($t->status) ?></td>
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
    <form action="<?= base_url('karyawan/Kategori/add')?>" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="Divisi">Kategori</label>
              <input type="text" name="kategori" class="form-control" id="nama" placeholder="kategori" required>
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
