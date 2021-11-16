<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div id="suratPenerimaan">
    <div class="col-lg-12">
    <?php
    if (session()->getFlashdata('message')) {
    ?>
      <div class="alert alert-info">
        <?= session()->getFlashdata('message') ?>
      </div>
    <?php
    }
    ?>

    <form id="form" action="<?= base_url('set-penerimaan-action') ?>" accept-charset="utf-8">
    <?= csrf_field() ?>
   <div class="form-group">
      <label for="no_surat">No Surat</label>
      <input type="text" name="no_surat" value="<?= !empty($data_surat_penerimaan['no_surat']) ? $data_surat_penerimaan['no_surat'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="hal">Hal</label>
      <input type="text" name="hal" value="<?= !empty($data_surat_penerimaan['hal']) ? $data_surat_penerimaan['hal'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="lokasi_surat">Lokasi Surat</label>
      <input type="text" name="lokasi_surat" value="<?= !empty($data_surat_penerimaan['lokasi_surat']) ? $data_surat_penerimaan['lokasi_surat'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="panitia">Panitia</label>
      <input type="text" name="panitia" value="<?= !empty($data_surat_penerimaan['panitia']) ? $data_surat_penerimaan['panitia'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <button type="submit" class="btn btn-primary">Save</button>
      <label for="error"></label>
   </div>
</form>
    </div>
</div>
<?= $this->endSection(); ?>
