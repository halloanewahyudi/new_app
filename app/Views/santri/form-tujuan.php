<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="berkasPage" class="pb-5">

  <div class="row">
    <div class="col-lg-8">
   <?php
    if (session()->getFlashdata('message')) {
    ?>
      <div class="alert alert-info">
        <?= session()->getFlashdata('message') ?>
      </div>
    <?php
    }
    ?>
<form id="form" action="<?= $action; ?>" accept-charset="utf-8">
   <div class="form-group mb-3">
      <label for="jenjang">Jenjang</label>
      <input type="text" name="jenjang" value="<?= !empty($data_tujuan['jenjang']) ? $data_tujuan['jenjang'] : user()->educational_level ?>" class="form-control" />
   </div>
   <div class="form-group mb-3">
      <label for="kelas">Kelas</label>
      <input type="text" name="kelas" value="<?= !empty($data_tujuan['kelas']) ? $data_tujuan['kelas'] : '' ?>" class="form-control" />
   </div>
   <div class="mb-3">
     <label for="" class="form-label">Penanggung Jawab Biaya </label>
     <select class="form-control" name="pembiayaan" id="">
       <option value="Ayah"> Ayah</option>
       <option value="Ibu"> Ibu</option>
       <option value="Wali Murid">Wali Murid</option>
       <option value="Lain Lain">Lain-lain</option>
     </select>
   </div>
   <div class="form-group">
      <button type="submit" class="btn btn-primary">Save</button>

   </div>
</form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>