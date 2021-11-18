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
              <div class="image col-sm-2 text-center bg-light">
                <?php 
                if (!empty($data_photo['file'])) : ?>
                  <img src="<?= base_url('berkas/' . $data_photo['file']) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">1</h2>
                <?php endif; ?>
              </div>
              <div class="title col-sm-8 ">
                <span>Photo Calon Santri</span>
              </div>
              <div class="col-sm-2">
                <button id="file_1"
                 data-status="1" 
                 data-judul="Photo Santri"
                class="btn-upload btn btn-sm btn-outline-primary w-100">
                  Upload
                </button>
              </div>
            </div>
          </div>
        </div>

        <div id="" class="card">
          <div class="card-body">
            <div class="d-md-flex row align-items-center">
              <div class="image col-sm-2 text-center bg-light">
                <?php if (!empty($data_kesanggupan['file'])) : ?>
                  <img src="<?= base_url('berkas/' . $data_kesanggupan['file']) ?>" height="50">
                <?php else : ?>
                  <h2 class="text-center">2</h2>
                <?php endif; ?>
              </div>
              <div class="title col-sm-8">
                <span> Surat Kesanggupan </span>
              </div>
              <div class="col-sm-2">
                <button id="file_2" 
                data-status="2" 
                data-judul="Surat Kesanggupan"
                class="btn-upload btn btn-sm btn-outline-primary w-100">
                  Upload
                </button>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- end file list -->

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

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="form" action="<?= $action ?>"  method="post"  enctype="multipart/form-data" data-validate>
        <div class="modal-body">
        
                  <?= csrf_field() ?>
                  <input type="hidden" name="status"  id="status">
                  <input type="hidden" name="judul_berkas" id="judul_berkas">

                  <div class="form-group mb-3">
                    <label for="berkas" class="form-label">Upload Berkas</label> <br>
                    <input type="file" ref="file" class="form-control" accept="image/*"  name="file"  id="file" required>
                  </div>

                  <div class="form-group  mb-3">
                    <label for="deskripsi">Keterangan</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"></textarea>
                  </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="save">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script>

    $(document).ready(function() {

    var myModal = new bootstrap.Modal(document.getElementById('myModal'))
    // button on click
    $('.btn-upload').on('click',function(){
      // modal show
       myModal.show();
      // ajax post
        var status = $(this).attr('data-status');
       var judul = $(this).attr('data-judul');
       $('#judul_berkas').val(judul);
       $('#status').val(status);
     });
    });
  </script>
</div>
<style>
  .delete {
    cursor: pointer;
  }

  .card {
    margin-bottom: 15px;
  }
</style>
<?= $this->endSection(); ?>