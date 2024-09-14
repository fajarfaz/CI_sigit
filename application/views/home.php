<?php include "header.php"; ?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-5">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <h3 class="text-center"><?= $list->perusahaan ?></h3>
    
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4"><?= $list->title ?></h2>
            <div class="row ">
              <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="<?= base_url('Home/cari')?>" method="post">
                        <div class="input-group">
                            <input type="search" name="cari" class="form-control form-control" placeholder="Cari dokumen berdasarkan nomor, nama dokumen, kategori atau pembuat..." required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-5">
                     <div class="item-center item-fluid">
                      <?php foreach($divisi as $k): ?>
                        <a href="<?= base_url('Home/divisi/'.$k->id)?>" class="btn btn-app ml-4 mb-4 bg-primary">
                          <span class="badge bg-warning"><?= $k->total ?></span>
                          <i class="fas fa-inbox"></i> <?= $k->divisi ?>
                        </a>
                        <?php endforeach ?>
                     </div>
                    </div>
                </div>
              <div class="col-md-3"></div>
            </div>
            
        </div>
    </section>
</div>

<?php include "footer.php"; ?>