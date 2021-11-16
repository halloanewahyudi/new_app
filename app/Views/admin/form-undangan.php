<?= $this->extend('layouts/admin-layout'); ?>
<?= $this->Section('content'); ?>
<form id="form" action="<?= $action; ?>" accept-charset="utf-8">
   <div class="form-group">
      <label for="no_surat">No Surat</label>
      <input type="text" name="no_surat" value="<?= !empty($data_undangan['no_surat']) ? $data_undangan['no_surat'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="hari_tangal">Hari Tangal</label>
      <input type="text" name="hari_tangal" value="<?= !empty($data_undangan['hari_tangal']) ? $data_undangan['hari_tangal'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="jam">Jam</label>
      <input type="text" name="jam" value="<?= !empty($data_undangan['jam']) ? $data_undangan['jam'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="jenis_ujian">Jenis Ujian</label>
      <input type="text" name="jenis_ujian" value="<?= !empty($data_undangan['jenis_ujian']) ? $data_undangan['jenis_ujian'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="tempat">Tempat</label>
      <input type="text" name="tempat" value="<?= !empty($data_undangan['tempat']) ? $data_undangan['tempat'] : '' ?>" class="form-control" />
   </div>
   <div class="form-group">
      <label for="materi_ujian">Materi Ujian</label>
      <input type="text" name="materi_ujian" value="<?= !empty($data_undangan['materi_ujian']) ? $data_undangan['materi_ujian'] : '' ?>" class="form-control" />
   </div>

   <div class="form-group">
      <button type="submit" class="btn btn-primary">Save</button>

   </div>
</form>
<?= $this->endSection();  ?>