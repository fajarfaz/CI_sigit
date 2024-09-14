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
                                  <a href="<?= base_url('petugas/Pinjam/approve/'.$t->id) ?>"  class="btn btn-outline-success btn-sm " title="Approve"> <i class="fas fa-check"></i></a>
                                <a href="<?= base_url('petugas/Pinjam/tolak/'.$t->id) ?>"  class="btn btn-outline-danger btn-sm " title="Tolak"> <i class="fas fa-times-circle"></i></a>
                                <?php } else {?>
                                  <a href="<?= base_url('Home/arsip/'.$t->id_arsip.'/'.$t->no_arsip); ?>"  class="btn btn-outline-info btn-sm " title="detail"> <i class="fas fa-eye"></i></a>
                                  <a href="<?= base_url('petugas/Pinjam/kembali/'.$t->id) ?>"  class="btn btn-outline-warning btn-sm <?= (($t->status == "5") || ($t->status == "2")) ? 'd-none' : '' ?>" title="dikembalikan"> <i class="fas fa-handshake"></i></a>
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
