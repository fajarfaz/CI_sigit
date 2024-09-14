<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                <?php if($t_arsip->total == 0){
                      echo "Kosong";
                    }else{
                      echo $t_arsip->total;
                    } ?>
                </h3>

                <p>Dokumen</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('petugas/Arsip')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                <?php if($t_divisi->total == 0){
                      echo "Kosong";
                    }else{
                      echo $t_divisi->total;
                    } ?>
                </h3>

                <p>Divisi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('petugas/Divisi')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                <?php if($t_pinjam->total == 0){
                      echo "Kosong";
                    }else{
                      echo $t_pinjam->total;
                    } ?>
                </h3>

                <p>Pinjaman</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('petugas/Pinjam')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                <?php if($t_user->total == 0){
                      echo "Kosong";
                    }else{
                      echo $t_user->total;
                    } ?>
                </h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('petugas/Users')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- upload download -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title text-primary">Dokumen Terbaru</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>No Dokumen</th>
                    <th>Nama Dokumen</th>
                    <th>Pengguna</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($terbaru as $t): ?>
                      <tr>
                        <td><a href="<?= base_url('Home/arsip/'.$t->id.'/'.$t->no_arsip)?>">
                        <?= $t->no_arsip ?></a></td>
                        <td><?= $t->nama ?></td>
                        <td><?= $t->nama_user ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Dokumen Populer</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>No Dokumen</th>
                    <th>Nama Dokumen</th>
                    <th>viewer</th>
                    <th>Downloader</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($populer as $t): ?>
                      <tr>
                        <td><a href="<?= base_url('Home/arsip/'.$t->id.'/'.$t->no_arsip)?>">
                        <?= $t->no_arsip ?></a></td>
                        <td><?= $t->nama ?></td>
                        <td class="text-center"><?= $t->viewer ?></td>
                        <td class="text-center"><?= $t->downloader ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title text-primary">Peminjaman Dokumen</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>No Dokumen</th>
                    <th>Nama Dokumen</th>
                    <th>Tgl Ambil</th>
                    <th>Tgl Kembali</th>
                    <th>Peminjam</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($pinjam as $t): ?>
                      <tr>
                        <td><a href="<?= base_url('Home/arsip/'.$t->id_arsip.'/'.$t->no_arsip)?>">
                        <?= $t->no_arsip ?></a></td>
                        <td><?= $t->dokumen ?></td>
                        <td><?= $t->tgl_pinjam ?></td>
                        <td><?= $t->tgl_kembali ?></td>
                        <td><?= $t->nama_user ?></td>
                        <td><?= status_pinjam($t->status) ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
        <!-- end upload download -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->