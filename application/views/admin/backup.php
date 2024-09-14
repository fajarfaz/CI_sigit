<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title text-primary"><i class="fas fa-database text-primary"></i> <strong>Backup Database</strong></h3>
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
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-primary">
                    <h3 class="widget-user-username">BACKUP DATA</h3>
                    <img style="width:20%" class="mt-2" src="<?= base_url('upload/setting/backup.png') ?>" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-4">
                        <?php echo form_open('admin/Backup/backup'); ?>
                        <button class="btn btn-primary btn-sm btn-block"><i class="fas fa-cloud-download-alt"></i> Backup</button>
                        <?php echo form_close(); ?>
                      </div>
                      <div class="col-md-4"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3"></div>
            </div>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- bs-custom-file-input -->
<!-- <script src="<?php echo base_url() ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script> -->