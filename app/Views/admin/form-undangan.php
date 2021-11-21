<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<div class="col-lg-4">
<form id="form" action="<?= $action; ?>" accept-charset="utf-8">
   <div class="form-group">
      <label for="no_surat">No Surat</label>
      <input type="text" name="no_surat" value="<?= !empty($data_undangan['no_surat']) ? $data_undangan['no_surat'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="hari_tangal">Hari Tangal</label>
      <input type="text" name="hari_tanggal" value="<?= !empty($data_undangan['hari_tanggal']) ? $data_undangan['hari_tanggal'] : '' ?>" class="form-control datepicker" />
   </div>
   <div class="form-group">
      <label for="jam">Jam</label>
      <input type="text" name="jam" value="<?= !empty($data_undangan['jam']) ? $data_undangan['jam'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="tempat">Tempat</label>
      <input type="text" name="tempat" value="<?= !empty($data_undangan['tempat']) ? $data_undangan['tempat'] : '' ?>" class="form-control" />
   </div>

   <div class="form-group">
      <label for="jenis_ujian">Jenis Undangan</label>
      <input type="text" name="jenis_undangan" value="<?= !empty($data_undangan['jenis_undangan']) ? $data_undangan['jenis_undangan'] : '' ?>" class="form-control" />
   </div>

   <div class="form-group">
      <label for="materi_ujian">Keterangan</label>
      <textarea name="keterangan" id="" rows="4" class="form-control">
      <?= !empty($data_undangan['keterangan']) ? $data_undangan['keterangan'] : '' ?>
      </textarea>
   </div>

   <div class="form-group mt-3">
      <button type="submit" class="btn btn-primary">Save</button>

   </div>
</form>
</div>
<?= $this->endSection();  ?>