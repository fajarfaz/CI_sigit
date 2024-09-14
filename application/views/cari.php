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
              <li class="breadcrumb-item"><a href="<?= base_url('Home')?>">Home</a></li>
              <li class="breadcrumb-item active">Pencarian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title text-primary"> <strong># Hasil Pencarian </strong></h3>
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
                        <th>Kategori</th>
                        <th>Tgl upload</th>
                        <th>Pembuat</th>
                        <th style="width:9%">Menu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($cari)){ 
                         foreach($cari as $l){?>
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
                          <td><?= $l->kategori?></td>
                          <td><?= $l->created?></td>
                          <td><?= $l->nama_user?></td>
                          <td>
                            <?php if ($this->session->userdata('status')== 'login'){ ?>
                            <a href="<?= base_url('Home/arsip/'.$l->id.'/'.$l->no_arsip)?>" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> </a>
                            <a href="<?= base_url('Home/download/'.$l->id.'/'.$l->file)?>" class="btn btn-outline-success btn-sm"><i class="fas fa-download"></i> </a>
                            <?php } else {?>
                            <button onclick="pesan()" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> </button>
                            <button onclick="pesan()" class="btn btn-outline-success btn-sm"><i class="fas fa-download"></i> </button>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php } } else {?>
                        <tr>
                          <td colspan="7" class="text-center">- DATA YANG ANDA CARI TIDAK DI TEMUKAN -</td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </section>
</div>
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
      
    
    })
  </script>
<?php include "footer.php"; ?>