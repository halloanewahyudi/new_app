<?= $this->extend('layouts/main'); ?>
<?= $this->Section('content'); ?>
<div id="berkasPage" class="pb-5">
  <div class="row">
    <div class="col-lg-8">
      <!-- uplad berkas -->
      <div class="file-list">
        <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex row align-items-center">
            <div class="image col-sm-2">
              <?php if(!empty($data_photo['file'])): ?>
                <img src="<?= base_url('berkas/'.$data_photo['file']) ?>" class="img-fluid">
                <?php else: ?>
                  <h2>1</h2>
              <?php endif; ?>
            </div>
               <div class="title col-sm-8 text-center text-md-left text-lg-left">
                <span>Photo Calon Santri</span>
              </div>
              <div class="col-sm-2">
                <button id="file_1" class="btn btn-sm btn-outline-primary w-100">
                    Upload
                </button>
              </div>
            </div>
          </div>
        </div>

        <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex row align-items-center">
            <div class="image col-sm-2">
              <?php if(!empty($data_kesanggupan['file'])): ?>
                <img src="<?= base_url('berkas/'.$data_kesanggupan['file']) ?>" class="img-fluid">
                <?php else: ?>
                  <h2>2</h2>
              <?php endif; ?>
            </div>
               <div class="title col-sm-8">
                <span> Surat Kesanggupan </span>
              </div>
              <div class="col-sm-2">
                <button id="file_2" class="btn btn-sm btn-outline-primary">
                    Upload
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>


     
    </div> <!-- end col 8 -->
    <div class="col-lg-4">
    <div class="card text-left">
        <div class="card-body">
          <h5 class="card-title">Upload Berkas</h5>
          <span class="card-text">
            upload Berkas - berkas berikut dengan ketentuan
          </span>
          <ul>
            <li>Berkas dapat di baca dengan jelas</li>
            <li>Ukuran berkas di bawah 1MB</li>
            <li>Untuk berkas berupa rapor kurikulum 2013 yang jumlahnya lebih dari 1 halaman dapat menggunakan format PDF</li>
            <li>Selain berkas tersebut dapat menggunakan format JPG,PNG</li>
          </ul>
          <span class="card-text">
            Petunjuk upload:
          </span>
          <ul>
            <li>Harap upload berkas satu-persatu</li>
            <li>Pilih jenis berkas yang akan di upload </li>
            <li>Lengkapi berkas</li>
          </ul>
  
        </div>
      </div>
    </div> <!-- end col4 -->
  </div>
  <script>
   
  </script>
</div>
<style>
  .delete {
    cursor: pointer;
  }
  .card{
    margin-bottom:15px;
  }
</style>
<?= $this->endSection(); ?>