<?php include "header.php"; ?>
 <!-- daterange picker -->
 <link rel="stylesheet" href="<?php echo base_url()?>/assets/plugins/daterangepicker/daterangepicker.css">
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper mt-5">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('')?>">Home</a></li>
              <li class="breadcrumb-item active">Detail Arsip</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Detail arsip</h3>
              </div>
              <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Nomor Dokumen</th>
                    <td>: <?= $arsip->no_arsip ?></td>
                  </tr>
                  <tr>
                    <th>Nama Dokumen</th>
                    <td>: <?= $arsip->nama ?></td>
                  </tr>
                  <tr>
                    <th>Deskripsi</th>
                    <td>: <?= $arsip->deskripsi ?></td>
                  </tr>
                  <tr>
                    <th>Tipe File</th>
                    <td>: <?= $arsip->jenis ?></td>
                  </tr>
                  <tr>
                    <th>Ukuran File</th>
                    <td>: <?= $arsip->size ?> Kb</td>
                  </tr>
                  <tr>
                    <th>Kategori</th>
                    <td>: <?= $arsip->kategori ?></td>
                  </tr>
                  <tr>
                    <th>Divisi</th>
                    <td>: <?= $arsip->divisi ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Upload</th>
                    <td>: <?= $arsip->created ?></td>
                  </tr>
                  <tr>
                    <th>Diupload oleh</th>
                    <td>: <?= $arsip->nama_user ?></td>
                  </tr>
                </table>
                # Lokasi Penyimpanan :
                  <hr>
                  <table class="table">
                    <tr>
                      <th>Ruang </th>
                      <td>: <?= $arsip->ruang ?></td>
                    </tr>
                    <tr>
                      <th>Rak </th>
                      <td>: <?= $arsip->rak ?></td>
                    </tr>
                    <tr>
                      <th>Box </th>
                      <td>: <?= $arsip->box ?></td>
                    </tr>
                    <tr>
                      <th>Map </th>
                      <td>: <?= $arsip->map ?></td>
                    </tr>
                  </table>
              </div>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-7">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Share Dokumen</h5>
              </div>
              <div class="card-body">
               <div class="row">
                <div class="col-md-4">
                  <label for="">Share ke :</label> <br>
                  <a href="https://api.whatsapp.com/send?text=Halo, saya ingin berbagi link arsip ini dengan kamu: <?= base_url('Home/download/'.$arsip->id.'/'.$arsip->no_arsip)?>" class="btn btn-outline-success btn-sm" target="_blank"><li class="fab fa-whatsapp"></li></a>
                  <a href="https://t.me/share/url?url=<?= base_url('Home/download/'.$arsip->id.'/'.$arsip->no_arsip)?>&text=Halo, saya ingin berbagi link arsip ini dengan kamu" target="_blank" class="btn btn-outline-info btn-sm"><li class="fab fa-telegram"></li></a>
                  <a href="mailto:?subject=Subject%20of%20Email&body=Halo, saya ingin berbagi link ini dengan kamu:%20<?= base_url('Home/download/'.$arsip->id.'/'.$arsip->no_arsip)?>" class="btn btn-outline-danger btn-sm"><li class="fas fa-envelope"></li></a>
                  <button onclick="copyToClipboard('<?= base_url('Home/arsip/'.$arsip->id.'/'.$arsip->no_arsip); ?>')" class="btn btn-outline-info btn-sm"><li class="fas fa-link"></li></button>
                </div>
                <div class="col-md-5">
                  <label for="">Atau :</label> <br>
                  <a href="<?= base_url('Home/download/'.$arsip->id.'/'.$arsip->file)?>" class="btn btn-outline-success btn-sm"><li class="fas fa-download"></li> Download</a>
                  <?php if($arsip->id_user != $this->session->userdata('id') and $this->session->userdata('id') != '1'){ ?>
                    <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#tambah"><li class="fas fa-handshake"></li> Pinjam</button>
                  <?php } ?>
                </div>
                <div class="col-md-3">
                  <input type="hidden" id="namafile" value="<?= $arsip->file ?>">
                  <label for="" class="text-center">Viewer</label> <br>
                 <li class="fas fa-eye"></li> <label for="" class="text-center"><?= $arsip->viewer ?></label> 
                </div>
               </div>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-header">
                Preview
              </div>
              <div class="card-body">
                <?php if ($arsip->jenis == 'pdf') {?>
                  <div id="pdf-container"></div>
                <?php } else {?>
                  # Hanya format pdf yang dapat di tampilkan.
                  <?php } ?>
              </div>
              <div class="card-footer">

              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- Modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
    <form action="<?= base_url('karyawan/Pinjam/add')?>" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Dokumen Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
         <label for="">Nama Dokumen</label>
         <input type="hidden" class="form-control" id="nama" name="dokumen" value="<?= $arsip->id?>" readonly>
         <input type="text" class="form-control"  value="<?= $arsip->nama?>" readonly>
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
<!-- preview pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>

<script>
  var namafile = $('#namafile').val();
  // URL PDF yang akan ditampilkan
  const pdfUrl = '<?= base_url('')?>upload/file/'+namafile;

  // Ambil elemen HTML tempat menampilkan PDF
  const container = document.getElementById('pdf-container');

  // Muat PDF dengan menggunakan PDF.js
  pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
    // Ambil halaman pertama dari PDF
    return pdf.getPage(1);
  }).then(page => {
    // Buat elemen canvas untuk menampilkan halaman PDF
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');

    // Hitung ukuran canvas sesuai dengan ukuran halaman PDF
    const viewport = page.getViewport({ scale: 1 });
    canvas.width = viewport.width;
    canvas.height = viewport.height;

    // Render halaman PDF ke canvas
    const renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    page.render(renderContext);

    // Tambahkan elemen canvas ke container
    container.appendChild(canvas);
  });
</script>


<?php include "footer.php"; ?>