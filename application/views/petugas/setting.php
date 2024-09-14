<div class="container">
<div class="col-lg-12 grid-margin ">
              <div class="card">
                <form action="<?= base_url('admin/Setting/proses_update')?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    <h4 class="card-title"><i class="ti-book"></i> Setting Website</h4>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="Nama Web">Nama Perusahaan</label>
                          <input type="text" class="form-control" name="perusahaan" value="<?= $list->perusahaan ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="Nama Web">Nama Website</label>
                          <input type="text" class="form-control" name="title" value="<?= $list->title ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea name="deskripsi" class="form-control" id="" cols="1" rows="4" required><?= $list->deskripsi?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="Keyword">Keyword</label>
                          <textarea name="keyword" class="form-control" id="" cols="1" rows="4" required><?= $list->keyword?></textarea>
                        </div>
                        
                        
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="deskripsi">Icon </label>
                          <input type="file" class="form-control" id="icon" name="icon" multiple accept="image/png, image/jpeg, image/jpg" required></input>
                          <small>noted: Jenis foto  : JPG|JPEG|PNG & size maksimal : 2 mb</small>
                        </div>
                        <div class="form-group">
                          <label for="deskripsi">Logo</label>
                          <input type="file" class="form-control" id="logo" name="logo" multiple accept="image/png, image/jpeg, image/jpg" required></input>
                          <small>noted: Jenis foto  : JPG|JPEG|PNG & size maksimal : 2 mb</small>
                        </div>
                        <div class="form-group">
                          <label for="SK">S&K</label>
                          <textarea name="sk" class="form-control" id="" cols="1" rows="4" required><?= $list->sk?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="SK">Alamat Kantor</label>
                          <textarea name="alamat" class="form-control" id="" cols="1" rows="4" required><?= $list->alamat?></textarea>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success float-right mb-3"><i class="ti-save"> Perbarui</i></button>
                    
                </div>
                </form>
              </div>
            </div>
</div>
