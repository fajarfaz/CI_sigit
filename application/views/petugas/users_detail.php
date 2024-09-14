<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title text-primary">
                  <i class="fas fa-user"></i>
                  Profil : <?= $users->nama_user ; ?>
                </h3>
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
                <div class="row">
                  <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                      <a class="nav-link active" id="profil-tab" data-toggle="pill" href="#profil" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Profile</a>
                      <a class="nav-link " id="upload-tab" data-toggle="pill" href="#upload" role="tab" aria-controls="vert-tabs-messages" aria-selected="true">Histori Upload</a>
                      <a class="nav-link" id="download-tab" data-toggle="pill" href="#download" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Histori Download</a>
                      <a class="nav-link" id="pinjam-tab" data-toggle="pill" href="#pinjam" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Histori Pinjam</a>
                    </div>
                  </div>
                  <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                      <div class="tab-pane active show fade" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                        <div class="row">
                          <div class="col-md-4">
                            <!-- Profile Image -->
                              <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                  <div class="text-center">
                                    <?php if($users->foto == ""){?>
                                      <img class="profile-user-img img-fluid img-rounded"
                                        src="<?= base_url('upload/user/default.png')?>"
                                        alt="<?= $users->nama_user ?>">
                                    <?php }else { ?>
                                      <img class="profile-user-img img-fluid img-rounded"
                                        src="<?= base_url('upload/user/'.$users->foto)?>"
                                        alt="<?= $users->nama_user ?>">
                                    <?php } ?>
                                  </div>

                                  <h3 class="profile-username text-center"><?= $users->nama_user ?></h3>

                                  <p class="text-muted text-center"><?= $users->role ?></p>
                                </div>
                                <!-- /.card-body -->
                              </div>
                              <!-- /.card -->

                          </div>
                          <div class="col-md-8">
                            <!-- About Me Box -->
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title">Tentang</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <strong><i class="fas fa-key mr-1"></i> NIP</strong>

                                <p class="text-muted">
                                  <?= $users->nip ?>
                                </p>

                                <hr>

                                <strong><i class="fas fa-tag mr-1"></i> Divisi</strong>

                                <p class="text-muted"><?= $users->divisi ?></p>

                                <hr>

                                <strong><i class="fab fa-whatsapp mr-1"></i> Telp</strong>

                                <p class="text-muted">
                                  <span class="tag tag-danger"><?= $users->telp ?></span>
                                </p>

                                <hr>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade  " id="upload" role="tabpanel" aria-labelledby="upload-tab">
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
                                <th>Tanggal</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php foreach($upload as $t): ?>
                                  <tr>
                                    <td><a href="<?= base_url('Home/arsip/'.$t->id.'/'.$t->no_arsip)?>">
                                    <?= $t->no_arsip ?></a></td>
                                    <td><?= $t->nama ?></td>
                                    <td><?= $t->created ?></td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="download-tab">
                        <div class="card">
                            <div class="card-header border-0">
                              <h3 class="card-title text-primary">Download Terbaru</h3>
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
                                  <th>Tanggal</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($download as $t): ?>
                                    <tr>
                                      <td><a href="<?= base_url('Home/arsip/'.$t->id_arsip.'/'.$t->no_arsip)?>">
                                      <?= $t->no_arsip ?></a></td>
                                      <td><?= $t->nama ?></td>
                                      <td><?= $t->created ?></td>
                                    </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      <div class="tab-pane fade" id="pinjam" role="tabpanel" aria-labelledby="pinjam-tab">
                        <div class="card">
                              <div class="card-header border-0">
                                <h3 class="card-title text-primary">Peminjaman Terbaru</h3>
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
                                    <th>tgl kembali</th>
                                    <th>status</th>
                                    <th>Tanggal</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach($pinjam as $t): ?>
                                      <tr>
                                        <td><a href="<?= base_url('Home/arsip/'.$t->id_arsip.'/'.$t->no_arsip)?>">
                                        <?= $t->no_arsip ?></a></td>
                                        <td><?= $t->nama ?></td>
                                        <td><?= $t->tgl_kembali ?></td>
                                        <td><?= status_pinjam($t->status) ?></td>
                                        <td><?= $t->tgl_pinjam ?></td>
                                      </tr>
                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">

              </div>
              <!-- /.card -->
            </div>
            </div>
        </div>
    </div>
</section>
